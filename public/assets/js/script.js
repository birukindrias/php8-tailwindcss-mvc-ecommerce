const socket = io('ws://localhost:3000');

function joinRoom() {
    const room = document.querySelector('.room').innerHTML;
    socket.emit('jocin', room);
}
let winneri = 0;
let outerArray = [];
let gamearray = [];
let rooms = [10, 20, 30, 40];

for (let i = 0; i <= 99; i += 5) {
    let innerArray = [];
    for (let j = i; j < i + 5; j++) {
        innerArray.push(j);
    }
    outerArray.push(innerArray);
}
(() => {
    joinRoom()
})()

function displayNewArrayInGridView(array) {
    const grid = document.getElementById("grid");
    let arrc = []
    for (let i = 0; i < array.length; i++) {
        const row = document.createElement("tr");
        for (let j = 0; j < array[i].length; j++) {
            // const cell = document.createElement("td");
            row.textContent += array[i][j] + ',';
            arrc.push(array[i][j])
            // row.appendChild(cell);
        }

        row.setAttribute('id', arrc)
        row.setAttribute('class', 'cope')
        // row.setAttribute('onclick', send(event))
        arrc = []
        grid.appendChild(row);
    }
}
function clickElementsWithClass(className) {
    let elements = document.querySelectorAll(`className`);
    console.log(elements);
    console.log(className);
    for (let i = 0; i < elements.length; i++) {
        let element = elements[i];
        element.click();
    }
}

// setTimeout(() => {
//     let elements = document.querySelectorAll(`.cope`);
//     for (let i = 0; i < elements.length; i++) {
//         let element = elements[i];
//        setInterval(() => {
//            element.click();
//        }, 2000);
//     }
// }, 3000);
displayNewArrayInGridView(outerArray)
document.querySelectorAll('.cope').forEach(el => {
    // el.target.click()
    el.addEventListener('click', (e) => {
        console.log('sadf', gamearray.length);
        if (!gamearray.includes(e.target.innerHTML) && gamearray.length != 19
        ) {
            gamearray.push(e.target.innerHTML)
            const room = document.querySelector('.room').innerHTML;
            const number = e.target.innerHTML;
            console.log('message', { room, number });
            // socket.emit('message', { room, number });
            // e.target.style.color = 'Red'
            e.target.style.color = 'green'
            e.target.style.fontWeight = 'bold';

            e.target.setAttribute('disabled', '')
            return
        } else {
            if (gamearray.length == 19) {
                winner()
            }
        }



        e.target.style.color = 'green'
        // e.target.style.display = 'none'
        e.target.setAttribute('disabled', '')
    })
});





//send and recive
function sendMessage() {
    const room = document.getElementById('room').value;
    const message = document.getElementById('message').value;
    socket.emit('message', { room, message });
}

// socket.on('rooms', ({ user, message }) => {
//     const messagesDiv = document.getElementById('messages');
//     const newMessage = document.createElement('div');
//     newMessage.textContent = `[${user}]:${message}`;
//     messagesDiv.appendChild(newMessage);
// });


// check if the user is in the store and signuin


// winner 
// Choose a random row
function winner() {

    const randomRowIndex = Math.floor(Math.random() * gamearray.length);
    const randomRow = gamearray[randomRowIndex];

    // Choose a random column
    const randomColumnIndex = Math.floor(Math.random() * randomRow.length);
    const randomWinner = gamearray[randomColumnIndex];
    let winneri = randomRow
    // console.log("The random randomColumnIndex is:", randomColumnIndex);
    console.log("The random winner is:", randomRow);
    socket.emit('winner', winneri)
    document.querySelector('.winner').innerHTML = winneri;
    // document.getElementById('grid').innerHTML=`<tr id="${winneri}" class="cope">${winneri}</tr>`);
    const trElement = document.createElement("tr");
    trElement.id = winneri;
    // trElement.classList.add("cope");
    trElement.classList.add("cope");
    trElement.innerHTML = winneri;

    // Find the element with id "grid"
    const gridElement = document.getElementById("grid");
    gridElement.innerHTML = '';
    // Append the <tr> element to the "grid" element
    gridElement.appendChild(trElement);
    console.log('winner', winneri)
    // console.log("The random winner is:", randomWinner);
    if (gamearray.length == gamearray.length) {
        socket.emit('winner', winneri)
        console.log('winner', winneri)
    }
    // console.log(gamearray);

}
// setInterval(winner, 1000);
