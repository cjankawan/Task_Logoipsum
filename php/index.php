<?php
session_start();
$success_message = isset($_SESSION['success']) ? $_SESSION['success'] : '';
unset($_SESSION['success']); // Clear after displaying

// Check if user is logged in
$is_logged_in = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logoipsum</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <style>
        .task-container {
            max-width: 90%;
            width: 800px;
        }
        
        @media (max-width: 640px) {
            .task-container {
                width: 95%;
            }
        }
    </style>
</head>
<body>
  <?php if (!empty($success_message)): ?>
        <div id="toast-success" class="fixed top-5 right-5 bg-green-500 text-white px-4 py-3 rounded shadow-lg">
            <?php echo $success_message; ?>
        </div>
        <script>
            setTimeout(() => {
                document.getElementById('toast-success').style.display = 'none';
            }, 3000);
        </script>
    <?php endif; ?>
    <nav class="bg-white shadow-sm py-4 px-6">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center">
                    <div class="w-4 h-4 border-2 border-white transform rotate-45"></div>
                </div>
                <span class="text-xl font-semibold">Logoipsum</span>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="#" class="text-gray-600 hover:text-gray-900 transition-colors">Products</a>
                <a href="#" class="text-gray-600 hover:text-gray-900 transition-colors">Solutions</a>
                <a href="#" class="text-gray-600 hover:text-gray-900 transition-colors">Help center</a>
                <a href="#" class="text-gray-600 hover:text-gray-900 transition-colors">Get started</a>
            </div>

            <!-- Auth Buttons -->
            <div class="hidden md:flex items-center space-x-4">
                <?php if (isset($_SESSION['user_email'])): ?>
                    <span class="text-gray-700">Welcome, <strong><?php echo htmlspecialchars($_SESSION['user_email']); ?></strong></span>
                    <a href="logout.php" class="text-red-600 hover:text-red-700 transition-colors">Logout</a>
                <?php else: ?>
                    <a href="login.php" class="text-blue-600 hover:text-blue-700 transition-colors">Login</a>
                    <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        Request a demo
                    </a>
                <?php endif; ?>
            </div>

            <!-- Mobile Menu Button -->
            <button class="md:hidden text-gray-600" id="menuBtn">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden hidden" id="mobileMenu">
            <div class="px-4 py-3 space-y-3">
                <a href="#" class="block text-gray-600 hover:text-gray-900 transition-colors">Products</a>
                <a href="#" class="block text-gray-600 hover:text-gray-900 transition-colors">Solutions</a>
                <a href="#" class="block text-gray-600 hover:text-gray-900 transition-colors">Help center</a>
                <a href="#" class="block text-gray-600 hover:text-gray-900 transition-colors">Get started</a>
                <hr class="border-gray-200">
                <a href="/php/login.php" class="block text-blue-600 hover:text-blue-700 transition-colors">Login</a>
                <a href="#" class="block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-center">
                    Request a demo
                </a>
            </div>
        </div>
    </nav>
    <div class="w-full h-screen max-h-[600px] relative overflow-hidden bg-cover bg-center" style="background-image: url('img/preview.png');">
        <!-- Dark overlay for better text readability -->
        <div class="absolute inset-0 bg-[#0e1824] bg-opacity-90"></div>
        
        <!-- Content container -->
        <div class="container mx-auto px-4 h-full flex items-center relative z-20">
          <div class="w-full lg:w-1/2 text-white">
            <!-- Main heading -->
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
              Get instant cash flow with invoice factoring
            </h1>
            
            <!-- Subheading -->
            <p class="text-lg md:text-xl mb-8">
              Why wait? Get same day funding and a faster way to access cash flow.
            </p>
            
            <!-- CTA button -->
            <button class="bg-white text-indigo-900 font-semibold py-3 px-8 rounded-full hover:bg-indigo-100 transition duration-300">
              Get started
            </button>
            
            <!-- Indicator dots -->
            <div class="flex mt-12 space-x-2">
              <div class="w-3 h-3 rounded-full bg-purple-500"></div>
              <div class="w-3 h-3 rounded-full bg-gray-500 opacity-50"></div>
              <div class="w-3 h-3 rounded-full bg-gray-500 opacity-50"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="container mx-auto px-4 py-12 max-w-6xl">
        <!-- Header Section -->
        <div class="text-center mb-16">
          <h1 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900">Outsource payment collection</h1>
          <p class="text-lg text-gray-600 max-w-3xl mx-auto">Faster and flexible access to cash flow from one or all your invoices.</p>
        </div>
    
        <!-- First Row of Features -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
          <!-- Feature 1 -->
          <div class="text-center">
            <div class="flex justify-center mb-4">
              <svg class="w-12 h-12 text-pink-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
              </svg>
            </div>
            <h2 class="text-xl font-semibold mb-3">Access up to $100,000</h2>
            <p class="text-gray-600">We fund each invoice once approved and collect payment to optimise your cash flow.*</p>
          </div>
          
          <!-- Feature 2 -->
          <div class="text-center">
            <div class="flex justify-center mb-4">
              <svg class="w-12 h-12 text-pink-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
              </svg>
            </div>
            <h2 class="text-xl font-semibold mb-3">You choose invoices to get paid</h2>
            <p class="text-gray-600">Self-serve online portal available 24/7 or connect from your CRM or invoicing platform.</p>
          </div>
          
          <!-- Feature 3 -->
          <div class="text-center">
            <div class="flex justify-center mb-4">
              <svg class="w-12 h-12 text-pink-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
              </svg>
            </div>
            <h2 class="text-xl font-semibold mb-3">Simple pricing</h2>
            <p class="text-gray-600">Only pay for what you use, if you don't need us, there are no costs.</p>
          </div>
        </div>
        
        <!-- Second Row of Features -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- Feature 4 -->
          <div class="text-center">
            <div class="flex justify-center mb-4">
              <svg class="w-12 h-12 text-pink-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
              </svg>
            </div>
            <h2 class="text-xl font-semibold mb-3">Click and quick</h2>
            <p class="text-gray-600">We fund each invoice once approved and collect payment to optimise your cash flow.*</p>
          </div>
          
          <!-- Feature 5 -->
          <div class="text-center">
            <div class="flex justify-center mb-4">
              <svg class="w-12 h-12 text-pink-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
              </svg>
            </div>
            <h2 class="text-xl font-semibold mb-3">Flexible</h2>
            <p class="text-gray-600">Self-serve online portal available 24/7 or connect from your CRM or invoicing platform.</p>
          </div>
          
          <!-- Feature 6 -->
          <div class="text-center">
            <div class="flex justify-center mb-4">
              <svg class="w-12 h-12 text-pink-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
              </svg>
            </div>
            <h2 class="text-xl font-semibold mb-3">Invest in your business</h2>
            <p class="text-gray-600">Only pay for what you use, if you don't need us, there are no costs.</p>
          </div>
        </div>
      </div>
      
      <div class="bg-indigo-50 w-11/12 sm:w-3/4  mx-auto py-8 px-6">
        <div class="task-container mx-auto py-8 px-6 ">
          <h1 class="text-indigo-600 text-5xl md:text-6xl font-bold text-center mb-2">Task Manager</h1>
          <p class="text-gray-600 text-center mb-8">Your daily to do list</p>
          <div class="bg-white rounded-xl shadow-md p-8 w-full">
            <div id="task-list" class="mb-8 min-h-[100px]">
              <!-- Tasks will be added here dynamically -->
            </div>
            <div class="flex flex-col space-y-4">
              <div class="relative">
              <input
                type="text"
                id="new-task"
                placeholder="Add new task"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                <?php if (!$is_logged_in): ?>disabled<?php endif; ?>
                >
                </div>
                <?php if ($is_logged_in): ?>
                <button
                id="add-task-btn"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-4 rounded-lg transition duration-200 w-36"
                >
                Add Task
                </button>
                <?php else: ?>
                <a href="login.php" 
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-4 rounded-lg transition duration-200 w-36 text-center inline-block">
                Login to Add
                </a>
                <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="min-h-screen flex items-center justify-center p-8">
        <div class="w-full max-w-3xl">
          <h1 class="text-7xl font-bold text-center text-blue-700 mb-6">Contact us</h1>
          <p class="text-center text-gray-600 text-lg mb-12">Speak with our team to see how we can help your business.</p>
    
          <form class="space-y-6">
            <div class="flex flex-col gap-2">
              <input type="text" placeholder="Your name" class="w-full px-6 py-4 text-lg border border-gray-400 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>
    
            <div class="flex flex-col gap-2">
              <input type="email" placeholder="Email" class="w-full px-6 py-4 text-lg border border-gray-400 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>
    
            <div class="flex flex-col gap-2">
              <input type="tel" placeholder="Your best contact number" class="w-full px-6 py-4 text-lg border border-gray-400 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>
    
            <div class="flex flex-col gap-2">
                <textarea placeholder="Business or company name" class="w-full px-6 py-4 text-lg border border-gray-400 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500" rows="4"></textarea>
            </div>            
    
            <div class="flex justify-center pt-4">
                <button type="submit" class="w-full max-w-md px-4 py-3 text-lg text-white bg-blue-600 rounded-xl cursor-pointer transition-colors duration-200 hover:bg-blue-700">
                  Submit
                </button>
              </div>
              
          </form>
        </div>
      </div>
      <footer class="relative bg-blueGray-200 pt-8 pb-6">
        <div class="container mx-auto px-4">
          <div class="flex flex-wrap text-left lg:text-left">
            <div class="w-full lg:w-6/12 px-4">
              <h5 class="text-lg mt-0 mb-2 text-blueGray-600">
                  Curabitur consequat, purus a scelerisque sagittis, nulla metus tincidunt elit, vel venenatis nulla libero nec nulla. Suspendisse potenti. Aenean a justo vel sapien pellentesque tincidunt.
              </h5>
              <div class="mt-6 lg:mb-0 mb-6 flex flex-wrap items-center">
                  <button class="bg-white text-purple-600 shadow-lg font-normal h-10 w-10 flex items-center justify-center rounded-full outline-none focus:outline-none mr-2" type="button">
                    <i class="fab fa-linkedin"></i>
                  </button>
                  <button class="bg-white text-purple-600 shadow-lg font-normal h-10 w-10 flex items-center justify-center rounded-full outline-none focus:outline-none mr-2" type="button">
                    <i class="fas fa-envelope"></i>
                  </button>
                </div>
                
            </div>
            <div class="w-full lg:w-6/12 px-4">
              <div class="flex flex-wrap items-top mb-6">
                <div class="w-full lg:w-4/12 px-4 ml-auto">
                  <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">Products</span>
                  <ul class="list-unstyled">
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="#">Payments</a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="#">Invoice Factoring</a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="#">Invoice finance</a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="#">Supplier finance</a>
                    </li>
                    <li></li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="#">Customer finance</a>
                    </li>
                  </ul>
                </div>
                <div class="w-full lg:w-4/12 px-4">
                  <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">Company</span>
                  <ul class="list-unstyled">
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="#">About us</a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="#">Contact Us</a>
                    </li>
                  </ul>
                </div>
                <div class="w-full lg:w-4/12 px-4">
                  <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">Resources</span>
                  <ul class="list-unstyled">
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="#">Frequently asked questions</a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="#">Knowledge base</a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="#">API documentation</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="mt-10 border-t pt-6 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
              <div class="flex space-x-4">
                  <a href="#" class="hover:text-purple-500">Privacy policy</a>
                  <a href="#" class="hover:text-purple-500">Contact us</a>
              </div>
              <div class="mt-4 md:mt-0">
                  <span>Site map</span> <span class="mx-2">|</span> <span>@ebpearls</span>
              </div>
          </div>
        </div>
      </footer>
      <script>
        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('nav')) {
                mobileMenu.classList.add('hidden');
            }
        });
         // Script to handle responsive adjustments
         function adjustHeight() {
          const heroSection = document.querySelector('div.h-screen');
          if (window.innerHeight < 500) {
            heroSection.style.height = '500px';
          } else {
            heroSection.style.height = Math.min(window.innerHeight, 600) + 'px';
          }
        }
        document.addEventListener('DOMContentLoaded', function() {
          const taskList = document.getElementById('task-list');
          const newTaskInput = document.getElementById('new-task');
          const addTaskBtn = document.getElementById('add-task-btn');
          const isLoggedIn = <?php echo $is_logged_in ? 'true' : 'false'; ?>;
          
          // Show loading indicator
          function showLoading() {
              taskList.innerHTML = '<div class="flex justify-center items-center h-24"><div class="animate-spin rounded-full h-8 w-8 border-b-2 border-indigo-600"></div></div>';
          }
          
          // Show error message
          function showError(message) {
              taskList.innerHTML = `<div class="text-red-500 text-center py-4">${message}</div>`;
          }
          
          // Fetch tasks from server
          function fetchTasks() {
              if (!isLoggedIn) {
                  taskList.innerHTML = '<p class="text-center text-gray-500 py-4">Please login to view your tasks</p>';
                  return;
              }
              
              showLoading();
              
              fetch('task_api.php')
                  .then(response => response.json())
                  .then(data => {
                      if (data.status === 'success') {
                          renderTasks(data.tasks);
                      } else {
                          showError(data.message || 'Failed to load tasks');
                      }
                  })
                  .catch(error => {
                      console.error('Error fetching tasks:', error);
                      showError('Error connecting to server. Please try again later.');
                  });
          }
          
          // Render tasks in the list
          function renderTasks(tasks) {
              if (tasks.length === 0) {
                  taskList.innerHTML = '<p class="text-center text-gray-500 py-4">No tasks yet. Add one below!</p>';
                  return;
              }
              
              taskList.innerHTML = '';
              
              tasks.forEach(task => {
                  const taskElement = document.createElement('div');
                  taskElement.className = 'flex items-center justify-between py-3 border-b last:border-0';
                  taskElement.dataset.taskId = task.id;
                  taskElement.innerHTML = `
                      <div class="flex items-center">
                          <input 
                              type="checkbox" 
                              id="task-${task.id}" 
                              ${task.completed ? 'checked' : ''} 
                              class="w-5 h-5 mr-3 rounded focus:ring-indigo-500"
                          >
                          <label for="task-${task.id}" class="text-gray-800 ${task.completed ? 'line-through text-gray-500' : ''}">
                              ${escapeHTML(task.text)}
                          </label>
                      </div>
                      <button class="delete-btn text-red-500 border border-red-500 text-sm px-2 py-1 rounded hover:bg-red-50 flex items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                              <line x1="18" y1="6" x2="6" y2="18"></line>
                              <line x1="6" y1="6" x2="18" y2="18"></line>
                          </svg>
                          <span class="ml-1">Delete</span>
                      </button>
                  `;
                  
                  const checkbox = taskElement.querySelector(`#task-${task.id}`);
                  checkbox.addEventListener('change', () => toggleTask(task.id));
                  
                  const deleteBtn = taskElement.querySelector('.delete-btn');
                  deleteBtn.addEventListener('click', () => deleteTask(task.id));
                  
                  taskList.appendChild(taskElement);
              });
          }
          
          // Escape HTML to prevent XSS
          function escapeHTML(str) {
              return str
                  .replace(/&/g, '&amp;')
                  .replace(/</g, '&lt;')
                  .replace(/>/g, '&gt;')
                  .replace(/"/g, '&quot;')
                  .replace(/'/g, '&#039;');
          }
          
          // Add a new task
          function addTask() {
              const text = newTaskInput.value.trim();
              if (!text) return;
              newTaskInput.disabled = true;
              addTaskBtn.disabled = true;
              addTaskBtn.innerHTML = '<span class="inline-block animate-spin mr-2">↻</span> Adding...';
              
              const formData = new FormData();
              formData.append('action', 'add');
              formData.append('task_text', text);
              
              fetch('task_api.php', {
                  method: 'POST',
                  body: formData
              })
              .then(response => response.json())
              .then(data => {
                  if (data.status === 'success') {
                      newTaskInput.value = '';
                      fetchTasks(); 
                      
                      showToast('Task added successfully', 'success');
                  } else {
                      showToast(data.message || 'Failed to add task', 'error');
                  }
              })
              .catch(error => {
                  console.error('Error adding task:', error);
                  showToast('Error connecting to server', 'error');
              })
              .finally(() => {
                  newTaskInput.disabled = false;
                  addTaskBtn.disabled = false;
                  addTaskBtn.innerHTML = 'Add Task';
                  newTaskInput.focus();
              });
          }
          
          // Toggle task completion status
          function toggleTask(taskId) {
              const taskElement = document.querySelector(`[data-task-id="${taskId}"]`);
              if (!taskElement) return;
              
              const checkbox = taskElement.querySelector(`#task-${taskId}`);
              const label = taskElement.querySelector(`label[for="task-${taskId}"]`);
              
              label.classList.toggle('line-through');
              label.classList.toggle('text-gray-500');
              
              checkbox.disabled = true;
              
              const formData = new FormData();
              formData.append('action', 'toggle');
              formData.append('task_id', taskId);
              
              fetch('task_api.php', {
                  method: 'POST',
                  body: formData
              })
              .then(response => response.json())
              .then(data => {
                  if (data.status !== 'success') {
                      label.classList.toggle('line-through');
                      label.classList.toggle('text-gray-500');
                      checkbox.checked = !checkbox.checked;
                      showToast(data.message || 'Failed to update task', 'error');
                  }
              })
              .catch(error => {
                  console.error('Error toggling task:', error);
                  label.classList.toggle('line-through');
                  label.classList.toggle('text-gray-500');
                  checkbox.checked = !checkbox.checked;
                  showToast('Error connecting to server', 'error');
              })
              .finally(() => {
                  checkbox.disabled = false;
              });
          }
          
          // Delete a task
          function deleteTask(taskId) {
              const taskElement = document.querySelector(`[data-task-id="${taskId}"]`);
              if (!taskElement) return;
              
              taskElement.style.transition = 'opacity 0.3s';
              taskElement.style.opacity = '0.5';
              
              const deleteBtn = taskElement.querySelector('.delete-btn');
              deleteBtn.disabled = true;
              deleteBtn.innerHTML = '<span class="inline-block animate-spin mr-2">↻</span>';
              
              const formData = new FormData();
              formData.append('action', 'delete');
              formData.append('task_id', taskId);
              
              fetch('task_api.php', {
                  method: 'POST',
                  body: formData
              })
              .then(response => response.json())
              .then(data => {
                  if (data.status === 'success') {
                      taskElement.style.height = taskElement.offsetHeight + 'px';
                      taskElement.style.overflow = 'hidden';
                      setTimeout(() => {
                          taskElement.style.height = '0';
                          taskElement.style.padding = '0';
                          taskElement.style.margin = '0';
                          
                          setTimeout(() => {
                              taskElement.remove();
                              if (taskList.children.length === 0) {
                                  taskList.innerHTML = '<p class="text-center text-gray-500 py-4">No tasks yet. Add one below!</p>';
                              }
                          }, 300);
                      }, 50);
                      
                      showToast('Task deleted successfully', 'success');
                  } else {
                      taskElement.style.opacity = '1';
                      deleteBtn.disabled = false;
                      deleteBtn.innerHTML = `
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                              <line x1="18" y1="6" x2="6" y2="18"></line>
                              <line x1="6" y1="6" x2="18" y2="18"></line>
                          </svg>
                          <span class="ml-1">Delete</span>
                      `;
                      showToast(data.message || 'Failed to delete task', 'error');
                  }
              })
              .catch(error => {
                  console.error('Error deleting task:', error);
                  taskElement.style.opacity = '1';
                  deleteBtn.disabled = false;
                  deleteBtn.innerHTML = `
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <line x1="18" y1="6" x2="6" y2="18"></line>
                          <line x1="6" y1="6" x2="18" y2="18"></line>
                      </svg>
                      <span class="ml-1">Delete</span>
                  `;
                  showToast('Error connecting to server', 'error');
              });
          }
          
          // Show toast notification
          function showToast(message, type = 'success') {
              const toast = document.createElement('div');
              toast.className = `fixed top-5 right-5 ${type === 'success' ? 'bg-green-500' : 'bg-red-500'} text-white px-4 py-3 rounded shadow-lg z-50 transition-opacity duration-300`;
              toast.innerHTML = message;
              document.body.appendChild(toast);
              
              setTimeout(() => {
                  toast.style.opacity = '0';
                  setTimeout(() => {
                      toast.remove();
                  }, 300);
              }, 3000);
          }
          
          if (addTaskBtn) {
              addTaskBtn.addEventListener('click', addTask);
          }
          
          if (newTaskInput) {
              newTaskInput.addEventListener('keypress', (e) => {
                  if (e.key === 'Enter') addTask();
              });
          }
        
          fetchTasks();
      });

      document.addEventListener('DOMContentLoaded', function() {
        const contactForm = document.querySelector('form');
        
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `fixed top-5 right-5 ${type === 'success' ? 'bg-green-500' : 'bg-red-500'} text-white px-4 py-3 rounded shadow-lg z-50 transition-opacity duration-300`;
            toast.innerHTML = message;
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.style.opacity = '0';
                setTimeout(() => {
                    toast.remove();
                }, 300);
            }, 3000);
        }

        contactForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            // Get form inputs
            const nameInput = contactForm.querySelector('input[placeholder="Your name"]');
            const emailInput = contactForm.querySelector('input[type="email"]');
            const phoneInput = contactForm.querySelector('input[type="tel"]');
            const businessInput = contactForm.querySelector('textarea');

            const inputs = [nameInput, emailInput, phoneInput, businessInput];
            inputs.forEach(input => {
                input.classList.remove('border-red-500');
            });

            // Validation
            let hasErrors = false;
            
            if (!nameInput.value.trim()) {
                nameInput.classList.add('border-red-500');
                hasErrors = true;
            }

            if (!emailInput.value.trim() || !validateEmail(emailInput.value.trim())) {
                emailInput.classList.add('border-red-500');
                hasErrors = true;
            }

            if (hasErrors) {
                showToast('Please fill in all required fields correctly', 'error');
                return;
            }

            const submitButton = contactForm.querySelector('button[type="submit"]');
            const originalButtonText = submitButton.innerHTML;
            submitButton.disabled = true;
            submitButton.innerHTML = '<span class="inline-block animate-spin">↻</span> Sending...';

            try {
                // Submit form
                const formData = new FormData();
                formData.append('name', nameInput.value.trim());
                formData.append('email', emailInput.value.trim());
                formData.append('phone', phoneInput.value.trim());
                formData.append('business', businessInput.value.trim());

                const response = await fetch('contact_handler.php', {
                    method: 'POST',
                    body: formData
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();
                
                if (data.status === 'success') {
                    showToast(data.message, 'success');
                    contactForm.reset();
                } else {
                    showToast(data.message, 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showToast('An error occurred. Please try again later.', 'error');
            } finally {
                // Re-enable submit button
                submitButton.disabled = false;
                submitButton.innerHTML = originalButtonText;
            }
        });
    });
        
        // Run on load and resize
        window.addEventListener('load', adjustHeight);
        window.addEventListener('resize', adjustHeight);

    </script>
</body>
</html>