<section class="container">
  <footer>
      <div class="footer-container">
          <div class="left-col">
              <img src="{{asset('user')}}/logo.png" alt="" class="logo">
              <div class="social-media">
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-instagram"></i></a>
                  <a href="#"><i class="fab fa-youtube"></i></a>
                  <a href="#"><i class="fab fa-linkedin-in"></i></a>
              </div>
              <p class="rights-text">© 2021 Created By <b>FantacyDesigns</b> All Rights Reserved.</p>
          </div>

          <div class="right-col">
              <h1>Our Newsletter</h1>
              <div class="border"></div>
              <p>Enter Your Email to get our news and updates.</p>
              <form action="" class="newsletter-form">
                  <input type="text" class="txtb" placeholder="Enter Your Email">
                  <input type="submit" class="btn" value="submit">
              </form>
          </div>
      </div>

      <!-- Chatbot Section -->
      <div class="chatbot">
          <div class="chat-header">
              <p>Chat with Us</p>
              <span id="chat-toggle" style="cursor: pointer;">&#x2715;</span>
          </div>
          <div class="chat-body" id="chat-body">
              <div class="bot-message">
                  <p>Hello! How can I help you today?</p>
              </div>
          </div>
          <div class="chat-footer">
              <input type="text" id="user-input" placeholder="Type your message...">
              <button id="send-btn">Send</button>
          </div>
      </div>
  </footer>
</section>

<style>
  .chatbot {
      position: fixed;
      bottom: 20px;
      right: 20px;
      width: 300px;
      background-color: #f1f1f1;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      overflow: hidden;
      display: none; /* Initially hidden */
      flex-direction: column;
  }

  .chat-header {
      background-color: #007bff;
      color: white;
      padding: 10px;
      text-align: center;
      font-weight: bold;
      display: flex;
      justify-content: space-between;
      align-items: center;
  }

  .chat-body {
      padding: 10px;
      max-height: 200px;
      overflow-y: auto;
  }

  .chat-footer {
      display: flex;
      padding: 10px;
      background-color: #fff;
  }

  .chat-footer input {
      flex: 1;
      padding: 5px;
      border: 1px solid #ddd;
      border-radius: 4px;
      margin-right: 5px;
  }

  .chat-footer button {
      padding: 5px 10px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
  }

  .bot-message, .user-message {
      margin: 5px 0;
  }

  .bot-message p {
      background-color: #007bff;
      color: white;
      padding: 8px;
      border-radius: 10px;
      max-width: 70%;
  }

  .user-message p {
      background-color: #ddd;
      padding: 8px;
      border-radius: 10px;
      max-width: 70%;
      align-self: flex-end;
  }
</style>

<script>
  // Chatbot functionality
  document.getElementById('chat-toggle').addEventListener('click', () => {
      document.querySelector('.chatbot').style.display = 'none';
  });

  document.getElementById('send-btn').addEventListener('click', () => {
      const userInput = document.getElementById('user-input');
      const chatBody = document.getElementById('chat-body');

      if (userInput.value.trim() !== '') {
          // Display user's message
          const userMessage = document.createElement('div');
          userMessage.className = 'user-message';
          userMessage.innerHTML = `<p>${userInput.value}</p>`;
          chatBody.appendChild(userMessage);

          // Auto-reply message
          const botMessage = document.createElement('div');
          botMessage.className = 'bot-message';
          botMessage.innerHTML = `<p>I am busy, I will contact you later.</p>`;
          chatBody.appendChild(botMessage);

          // Clear input field
          userInput.value = '';

          // Scroll to the latest message
          chatBody.scrollTop = chatBody.scrollHeight;
      }
  });

  // Show chatbot on page load
  window.onload = () => {
      document.querySelector('.chatbot').style.display = 'flex';
  };
</script>
