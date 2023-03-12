// Get the HTML element with id "response_container"
let response_container = document.getElementById("response_container");
// Create an empty string to store responses from the chatbot
let response_collector = "";
// Define a function that triggers the chatbot
const triggerChat = async () => {
  // Get the value of the input element with id "prompt_input"
  let inputVal = document.getElementById("prompt_input").value;
  // Check if the input value is not null and not a number
  if (inputVal !== null && isNaN(inputVal)) {
    // Create an HTML element to display the user's input
    let input = `<div class="prompt-text">${inputVal}</div>`;
    // Add the user's input to the response collector
    response_collector += input;
    // Clear the input element
    document.getElementById("prompt_input").value = "";
    // Disable the trigger button to prevent multiple requests
    document.getElementById("trigerButton").setAttribute("disabled", true);
    // Update the HTML content of the response container with the response collector
    response_container.innerHTML = response_collector;
    // Create the data payload
    let dataSeconday = new URLSearchParams();
    dataSeconday.append("input", input);
    // Send a request to the server with the user's input
    let fData = await fetch(`../core/app_core/generate_chat.php`, {
      method: "POST",
      body: dataSeconday,
    });
    // Get the response data as text
    let data = await fData.text();
    // Add the response data to the response collector
    response_collector += await `<div class="response-text">${data}</div>`;
    // Update the HTML content of the response container with the response collector
    response_container.innerHTML = await response_collector;
    // Re-enable the trigger button
    document.getElementById("trigerButton").removeAttribute("disabled", true);
    // auto scroll down
    response_container.scrollTop = response_container.scrollHeight;
  } else {
    // Display an alert if the input value is not valid
    alert("Enter Correct Value");
  }
};
