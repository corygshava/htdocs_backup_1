// animate() syntax
  function animateBox() {
    const box = document.getElementById('box');

    // Define the animation properties
    const animationProperties = {
      left: '300px', // Final left position
      top: '200px',  // Final top position
      width: '200px', // Final width
      height: '200px', // Final height
      backgroundColor: 'red' // Final background color
    };

    // Specify animation options
    const animationOptions = {
      duration: 1000, // Animation duration in milliseconds
      easing: 'ease-out' // Easing function for smooth animation (linear, ease, ease-in, ease-out, etc.)
    };

    // Use the animate method to animate the box
    box.animate(animationProperties, animationOptions);
  }

//event listener practise

  // Function to add an event listener to an element
  function addCustomEventListener(eventName, elementSelector, eventFunction) {
    const elements = document.querySelectorAll(elementSelector);

    if (elements.length === 0) {
      console.error(`No elements matching the selector '${elementSelector}' found.`);
      return;
    }

    elements.forEach(element => {
      element.addEventListener(eventName, eventFunction);
    });
  }

  // Array containing common event names
  const eventNames = [
    'click',
    'dblclick',
    'mousedown',
    'mouseup',
    'mousemove',
    'mouseenter',
    'mouseleave',
    'mouseover',
    'mouseout',
    'keydown',
    'keyup',
    'keypress',
    'focus',
    'blur',
    'submit',
    'change',
    'input',
    'select',
    'contextmenu',
    'load',
    'unload',
    'resize',
    'scroll',
    'error',
    'abort',
    'beforeunload',
    'DOMContentLoaded',
    'DOMContentLoaded',
    'animationstart',
    'animationend',
    'animationiteration',
    'transitionstart',
    'transitionend',
    'transitioncancel',
    // Add more event names as needed
  ];


  // Example usage:
  function handleClick(event) {
    console.log('Element clicked!');
  }

addCustomEventListener('click', '.my-element', handleClick);

// keycode functions

  function displayKeycode(event) {
    const keycodeSpan = document.getElementById('keycode');
    keycodeSpan.textContent = event.keyCode;

    // Check if the pressed key has a keycode of 55 (the key '7')
    if (event.keyCode === 55) {
      handleKeycode55();
    }
  }

  // Function to handle the key with keycode 55
  function handleKeycode55() {
    alert("You pressed the key with keycode 55 (7)!");
  }

  // Add an event listener for the 'keydown' event on the document
  document.addEventListener('keydown', displayKeycode);

//timestamp processor

  function convertTimestamp(timestamp) {
    const now = new Date(); // Get the current date and time
    const inputDate = new Date(timestamp); // Convert the timestamp to a Date object

    // Calculate the time difference in milliseconds
    const timeDifference = now - inputDate;

    // Calculate years, months, weeks, days, hours, and minutes
    const years = now.getFullYear() - inputDate.getFullYear();
    const months = now.getMonth() - inputDate.getMonth();
    const weeks = Math.floor(timeDifference / (1000 * 60 * 60 * 24 * 7));
    const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
    const hours = Math.floor(timeDifference / (1000 * 60 * 60));
    const minutes = Math.floor(timeDifference / (1000 * 60));

    // Create an object to store the results
    const result = {
      years,
      months,
      weeks,
      days,
      hours,
      minutes
    };

    return result;
  }

  // Example usage:
  const timestamp = 1632936000000; // Replace with your timestamp in milliseconds
  const timeObject = convertTimestamp(timestamp);
  console.log(timeObject);
