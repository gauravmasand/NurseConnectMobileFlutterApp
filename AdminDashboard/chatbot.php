<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technical Chatbot Interface</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to bottom right, #2c3e50, #3498db);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .chat-container {
            background-color: #ffffff;
            width: 100%;
            height: 90%;
            margin: 20px 20px 20px 20px; /* top right bottom left */
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        .chat-header {
            background-color: #343a40;
            color: #ffffff;
            padding: 15px;
            text-align: center;
            border-radius: 10px 10px 0 0;
            font-size: 1.2em;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .chat-header i {
            margin-right: 10px;
        }
        .chat-messages {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            background-color: #e9ecef;
        }
        .chat-input {
            display: flex;
            border-top: 1px solid #dee2e6;
            padding: 15px;
            background-color: #f8f9fa;
        }
        .chat-input input {
            flex: 1;
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 10px;
            outline: none;
            font-size: 1em;
        }
        .chat-input button {
            background-color: #343a40;
            border: none;
            color: white;
            border-radius: 5px;
            width: 45px;
            height: 45px;
            margin-left: 10px;
            outline: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .chat-input button:hover {
            background-color: #495057;
        }
        .chat-bubble {
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
            max-width: 75%;
            font-size: 1em;
            line-height: 1.5;
        }
        .chat-bubble.user {
            align-self: flex-end;
            background-color: #007bff;
            color: white;
        }
        .chat-bubble.bot {
            align-self: flex-start;
            background-color: #e9ecef;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">
            <i class="fas fa-robot"></i>
            <span>Dr. Assist</span>
        </div>
        <div class="chat-messages" id="chat-messages">
            <!-- Chat messages will be displayed here -->
        </div>
        <div class="chat-input">
            <input type="text" id="text" placeholder="Type your message...">
            <button onclick="generateResponse();"><i class="fas fa-paper-plane"></i></button>
        </div>
    </div>

    <script>
        function generateResponse() {
            var text = document.getElementById("text").value;
            var responseElement = document.getElementById("chat-messages");

            // Display user's message
            if (text.trim() !== "") {
                var userMessage = document.createElement("div");
                userMessage.classList.add("chat-bubble", "user");
                userMessage.textContent = text;
                responseElement.appendChild(userMessage);
                responseElement.scrollTop = responseElement.scrollHeight;
            }

            // Clear input field
            document.getElementById("text").value = "";

            // Show loading message from bot
            var loadingMessage = document.createElement("div");
            loadingMessage.classList.add("chat-bubble", "bot");
            loadingMessage.textContent = "Generating response...";
            responseElement.appendChild(loadingMessage);
            responseElement.scrollTop = responseElement.scrollHeight;

            fetch("response.php", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json', // Set content type to JSON
                },
                body: JSON.stringify({ text: text }) // Send the text as JSON
            })
            .then(res => res.json()) // Convert the response to JSON
            .then(res => {
                // Remove loading message
                responseElement.removeChild(loadingMessage);

                var botMessage = document.createElement("div");
                botMessage.classList.add("chat-bubble", "bot");
                if (res.error) {
                    botMessage.textContent = "Error: " + res.error;
                } else {
                    botMessage.textContent = res.response;
                }
                responseElement.appendChild(botMessage);
                responseElement.scrollTop = responseElement.scrollHeight;
            })
            .catch(err => {
                console.error("Error:", err);
                responseElement.removeChild(loadingMessage);
                var errorMessage = document.createElement("div");
                errorMessage.classList.add("chat-bubble", "bot");
                errorMessage.textContent = "Error: Unable to connect to server. Please try again later.";
                responseElement.appendChild(errorMessage);
                responseElement.scrollTop = responseElement.scrollHeight;
            });
        }
    </script>
</body>
</html>