$(document).ready(function() {
    const $messageInput = $('#messageInput');
    const $sendMessageButton = $('#sendMessage');
    const $chatContainer = $('.chat');
  
    $sendMessageButton.click(function() {
      sendMessage();
    });
  
    $messageInput.keyup(function(event) {
      if (event.key === 'Enter') {
        sendMessage();
      }
    });
  
    function sendMessage() {
      const messageText = $messageInput.val().trim();
  
      if (messageText === '') {
        return;
      }
  
      const $messageContainer = $('<div></div>');
      $messageContainer.addClass('message outgoing align-self-end');
      $messageContainer.text(messageText);
  
      $chatContainer.append($messageContainer);
  
    
      $messageInput.val('');
      $chatContainer.scrollTop($chatContainer[0].scrollHeight);
    }
  });