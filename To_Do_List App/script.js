const todoForm = document.getElementById('todo-form');
const todoInput = document.getElementById('todo-input');
const todoList = document.getElementById('todo-list');

let todos = JSON.parse(localStorage.getItem('todos')) || [];

function saveToLocalStorage() {
  localStorage.setItem('todos', JSON.stringify(todos));
}

function renderTodos() {
  todoList.innerHTML = '';

  todos.forEach(todo => {
    const li = document.createElement('li');
    li.className = todo.completed ? 'completed' : '';
    li.dataset.id = todo.id;

    const span = document.createElement('span');
    span.textContent = todo.text;
    span.style.cursor = 'pointer';

    // Toggle complete on click
    span.addEventListener('click', () => {
      toggleComplete(todo.id);
    });

    const deleteBtn = document.createElement('button');
    deleteBtn.textContent = '×';
    deleteBtn.className = 'delete-btn';

    deleteBtn.addEventListener('click', () => {
      deleteTodo(todo.id);
    });

    li.appendChild(span);
    li.appendChild(deleteBtn);
    todoList.appendChild(li);
  });
}

function addTodo(text) {
  const newTodo = {
    id: Date.now(),
    text: text,
    completed: false
  };
  todos.push(newTodo);
  saveToLocalStorage();
  renderTodos();
}

function toggleComplete(id) {
  todos = todos.map(todo => 
    todo.id === id ? {...todo, completed: !todo.completed} : todo
  );
  saveToLocalStorage();
  renderTodos();
}

function deleteTodo(id) {
  todos = todos.filter(todo => todo.id !== id);
  saveToLocalStorage();
  renderTodos();
}

todoForm.addEventListener('submit', e => {
  e.preventDefault();
  const text = todoInput.value.trim();
  if(text !== '') {
    addTodo(text);
    todoInput.value = '';
  } else {
    alert('Please enter a task!');
  }
});

renderTodos();