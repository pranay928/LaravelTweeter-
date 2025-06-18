<style>
    .btn-primary {
      background-color: #1d4ed8; /* Blue-600 */
      border: 1px solid #1e40af; /* Blue-700 */
      color: white;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 6px;
      margin-bottom: 10px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }
  
    .btn-primary:hover {
      background-color: #2563eb; /* Blue-500 */
      transform: scale(1.02);
    }
  
    .btn-primary:active {
      background-color: #1e3a8a; /* Blue-800 */
      transform: scale(0.98);
    }
  </style>
  
  <div>
    <button class="btn btn-primary" onclick="document.location.href='{{ route('logout') }}'">
      Logout
    </button>
  </div>
  
