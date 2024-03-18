function updateTimeDifference() {
    let datetimeElements = document.querySelectorAll('.datetime');
    const now = new Date(); // Current date and time
    const asiaManilaOffset = 8 * 60 * 60 * 1000; // Asia/Manila timezone offset in milliseconds (8 hours)
    const nowAsiaManila = new Date(now.getTime() + asiaManilaOffset); // Current date and time in Asia/Manila timezone

    datetimeElements.forEach(element => {
        const datetimeValue = new Date(element.dataset.time); // Date value from 'data-time' attribute
        const timeDifference = nowAsiaManila - datetimeValue; // Time difference in milliseconds

        // Calculate days, hours, minutes, and seconds from time difference
        const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

        // Format time difference into string
        const formattedTimeDifference = `${days} days ${hours} hours ${minutes} min ${seconds} sec ago`;

        // Update innerHTML of datetime element
        element.innerHTML = formattedTimeDifference;
    });
}
setInterval(updateTimeDifference, 30000); 

function createKeyframeAnimation(animationName, fromValue, toValue) {
    // Create a style element
    var style = document.createElement('style');
    style.type = 'text/css';
    document.head.appendChild(style);

    // Define the keyframe animation
    var keyframes = `@keyframes ${animationName} {
        0% { transform: ${fromValue}; }
        75% {}
        100% { transform: ${toValue}; }
    }`;

    // Append the keyframe animation to the style element
    style.appendChild(document.createTextNode(keyframes));
}

//document.addEventListener('DOMContentLoaded', function() {
    // Your code here
    elem = document.querySelector('.parent-wrapper');
    elemChild = document.querySelector('.bncontainer ul');
    bntitle = document.querySelector('.bntitle');
    eleCheckher1 = elem.offsetWidth  + elem.offsetLeft;
    // if(bntitle) {

    //     alert(bntitle.offsetWidth) 
    // }
    bnTitleWidth = bntitle.offsetWidth;
    eleCheckher = elem.offsetWidth - bnTitleWidth;
    // 1536 + 178
    //alert(elem.offsetWidth, eleCheckher);
   
     //elemChild.style.transform =  "translateX(-"+elemChild.offsetWidth+"px)";

     createKeyframeAnimation('scroll',"translateX("+eleCheckher+"px)","translateX(-"+elemChild.offsetWidth+"px)")
    
     const thirdSpan = elemChild.querySelectorAll('li')[2]; // Get the third span


     function checkThirdSpanPosition() {
        const thirdSpanLeft = thirdSpan.offsetLeft; // Get left position of the third span
      
        if (thirdSpanLeft === 0) {
          console.log("The third span has reached the left edge!");
          // Add your logic here (e.g., remove and re-append the span)
        }
      }

      // Check position initially
    checkThirdSpanPosition();

    // Get the third <li> element
    var li = document.querySelector('.bncontainer ul li:nth-child(0)');
function checkLeftValue() {
    

    var firstLi = document.querySelector('.bncontainer ul li:first-child');
    if (!firstLi) return; // Exit if no <li> element is found

    liWidth = firstLi.offsetWidth;

    

    // Get the computed style of the first <li> element
   var computedStyle = window.getComputedStyle(firstLi);
   leftValue = parseFloat(computedStyle.left);
    // var leftValue = parseFloat(firstLi.offsetWidth);
    console.log('Left: ', leftValue, 'Width: ',-liWidth);
    if (leftValue <= -liWidth) {
        console.log(liWidth);
    }
    
    // isTrue = true;
    // if (rect2.left <= width && isTrue) {
    //     li = elemChild.querySelector('li');
    //     elemChild.removeChild(li);
    //     elemChild.appendChild(li);
    //     //console.log('Third <li> element reached or passed 0 left');
    //     isTrue = false;
    //     // Do something when the left value reaches or passes 0
    // }
                                           
    
}

//setInterval(checkLeftValue, 300)
// Check the position periodically
//setInterval(checkLeftValue, 1000); // Check every 1 second

// Function to handle animation iteration
// Function to handle the animation
// Function to handle animation
// Function to handle animation
function handleAnimation() {
    // Get the <ul> element
    var ulElement = document.querySelector('.bncontainer ul');
    if (!ulElement) return; // Exit if no <ul> element is found

    // Get the first <li> element
    var firstLi = ulElement.querySelector('li');
    if (!firstLi) return; // Exit if no <li> element is found

    // Calculate the total width of all <li> elements
    var liWidth = Array.from(ulElement.querySelectorAll('li')).reduce((acc, li) => acc + li.offsetWidth, 0);
    console.log('Total width of <li> elements:', liWidth);

    // Get the translation distance of the <ul> element
    var transform = window.getComputedStyle(ulElement).transform;
    var matrix = new DOMMatrix(transform);
    var translationX = matrix.m41;
    console.log('Translation X:', translationX);

    // Check if the translation distance exceeds the total width of all <li> elements
    if (Math.abs(translationX) >= liWidth) {
        // Remove the first <li> element
        firstLi.remove();

        // Clone the removed <li> element
        var clonedLi = firstLi.cloneNode(true);

        // Append the cloned <li> element to the end of the list
        ulElement.appendChild(clonedLi);
        console.log('Element removed and appended');
    }

    // Request the next animation frame
    requestAnimationFrame(handleAnimation);
}

// Start the animation loop
//handleAnimation();

// Start the animation loop
//handleAnimation(); // Check every 1 second


//});



   // alert(elem.offsetWidth + elem.offsetLeft);
    //alert(elem.offsetLeft + elem.width);

// Example usage
// var from = 'translateX(0)';
// var to = 'translateX(100px)';
// createKeyframeAnimation('slideIn', from, to);