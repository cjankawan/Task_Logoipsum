<?php
// task_api.php
session_start();
require_once 'includes/db_connect.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not authenticated']);
    exit;
}

$user_id = $_SESSION['user_id'];
$response = ['status' => 'error', 'message' => 'Invalid request'];

// Get tasks
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $stmt = $pdo->prepare("SELECT task_id, task_text, is_completed FROM tasks WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$user_id]);
        $tasks = $stmt->fetchAll();
        
        $formatted_tasks = array_map(function($row) {
            return [
                'id' => $row['task_id'],
                'text' => $row['task_text'],
                'completed' => (bool)$row['is_completed']
            ];
        }, $tasks);
        
        echo json_encode(['status' => 'success', 'tasks' => $formatted_tasks]);
    } catch (PDOException $e) {
        error_log("Error fetching tasks: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to fetch tasks']);
    }
    exit;
}

// Add new task
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    $task_text = trim($_POST['task_text']);
    
    if (empty($task_text)) {
        echo json_encode(['status' => 'error', 'message' => 'Task text cannot be empty']);
        exit;
    }
    
    try {
        $stmt = $pdo->prepare("INSERT INTO tasks (user_id, task_text) VALUES (?, ?)");
        $stmt->execute([$user_id, $task_text]);
        $task_id = $pdo->lastInsertId();
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Task added successfully',
            'task' => [
                'id' => $task_id,
                'text' => $task_text,
                'completed' => false
            ]
        ]);
    } catch (PDOException $e) {
        error_log("Error adding task: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to add task']);
    }
    exit;
}

// Toggle task completion status
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'toggle') {
    $task_id = (int)$_POST['task_id'];
    
    try {
        // First check if the task belongs to the logged-in user
        $check_stmt = $pdo->prepare("SELECT task_id FROM tasks WHERE task_id = ? AND user_id = ?");
        $check_stmt->execute([$task_id, $user_id]);
        
        if (!$check_stmt->fetch()) {
            echo json_encode(['status' => 'error', 'message' => 'Task not found or not authorized']);
            exit;
        }
        
        // Update the completion status
        $stmt = $pdo->prepare("UPDATE tasks SET is_completed = NOT is_completed WHERE task_id = ?");
        $stmt->execute([$task_id]);
        
        // Get the updated status
        $status_stmt = $pdo->prepare("SELECT is_completed FROM tasks WHERE task_id = ?");
        $status_stmt->execute([$task_id]);
        $status = $status_stmt->fetch();
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Task status updated',
            'task_id' => $task_id,
            'completed' => (bool)$status['is_completed']
        ]);
    } catch (PDOException $e) {
        error_log("Error toggling task: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to update task status']);
    }
    exit;
}

// Delete task
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    $task_id = (int)$_POST['task_id'];
    
    try {
        // Check if the task belongs to the logged-in user
        $check_stmt = $pdo->prepare("SELECT task_id FROM tasks WHERE task_id = ? AND user_id = ?");
        $check_stmt->execute([$task_id, $user_id]);
        
        if (!$check_stmt->fetch()) {
            echo json_encode(['status' => 'error', 'message' => 'Task not found or not authorized']);
            exit;
        }
        
        $stmt = $pdo->prepare("DELETE FROM tasks WHERE task_id = ?");
        $stmt->execute([$task_id]);
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Task deleted successfully',
            'task_id' => $task_id
        ]);
    } catch (PDOException $e) {
        error_log("Error deleting task: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete task']);
    }
    exit;
}

echo json_encode($response);