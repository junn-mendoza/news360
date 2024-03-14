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
        const formattedTimeDifference = `${minutes} min ${seconds} sec ago`;

        // Update innerHTML of datetime element
        element.innerHTML = formattedTimeDifference;
    });
}
setInterval(updateTimeDifference, 30000); 