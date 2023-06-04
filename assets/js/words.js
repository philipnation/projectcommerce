const messages = [
    "Create",
    "Build",
    "Analyze",
    "Share",
    "Promote"
];
const interval = 2000; // milliseconds
let i = 0;
let text = '';

function typingEffect() {
if (i === messages.length) {
    i = 0;
}
text = messages[i];
let j = 0;
let speed = 100; // milliseconds

function typeWriter() {
    if (j < text.length) {
    document.getElementById("text-slide").innerHTML += text.charAt(j);
    j++;
    setTimeout(typeWriter, speed);
    }
}
typeWriter();
setTimeout(function() {
    deleteMessage();
}, interval);
}

function deleteMessage() {
let word = document.getElementById("text-slide");
let length = word.innerHTML.length;
let speed = 50; // milliseconds

function deleteWriter() {
    if (length > 0) {
    word.innerHTML = word.innerHTML.substring(0, length - 1);
    length--;
    setTimeout(deleteWriter, speed);
    } else {
    i++;
    typingEffect();
    }
}
deleteWriter();
}
typingEffect();