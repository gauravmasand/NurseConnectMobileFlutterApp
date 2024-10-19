<?php
// Load Composer's autoloader to include dependencies
require "vendor/autoload.php";

// Use the Gemini API client class (assuming it's part of the GeminiAPI library)
use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;

// Read the JSON input from the POST request
$data = json_decode(file_get_contents("php://input"), true);

// Check if 'text' exists in the POST request
if (isset($data['text'])) {
    $text = $data['text'];

    try {
        // Create a new instance of the Gemini API client
        $client = new Client("AIzaSyDV5HczZzc230owwoa_VtXhVNvRVJfuDL0"); // Replace with your actual API key

        // Send the text to the API and get the response
        $response = $client->geminiPro()->generateContent(
            new TextPart($text)
        );

        // Return the API response as JSON
        echo json_encode(['response' => $response->text()]);

    } catch (Exception $e) {
        // Return error as JSON if something goes wrong
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    // Return an error if 'text' is missing
    echo json_encode(['error' => 'No text provided']);
}
?>
