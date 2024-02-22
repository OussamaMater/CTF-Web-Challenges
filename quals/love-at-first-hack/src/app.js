var emoji = ['🤬', '😡'];
var totalEmojiCount = 100;
var context;
var canvasWidth;
var canvasHeight;
var emojies = [];

function initializeCanvas() {
    var canvas = document.getElementById('canvas');
    context = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    context.scale(2, 2);

    generateCanvasSize(canvas);
    generateEmojis();
}

function generateCanvasSize(canvas) {
    var coord = canvas.getBoundingClientRect();
    canvasWidth = coord.width;
    canvasHeight = coord.height;
}

function generateEmojis() {
    emojies = [];

    for (var iterate = 0; iterate < totalEmojiCount; iterate++) {
        var x = Math.floor(Math.random() * canvasWidth);
        var offsetY = Math.abs(Math.floor(Math.random() * 300));
        var fontSize = Math.floor(Math.random() * 40) + 20;

        emojies.push({
            emoji: emoji[Math.floor(Math.random() * emoji.length)],
            x,
            y: canvasHeight + offsetY,
            count: Math.floor(Math.random() * 3) + 4,
            fontSize,
        });

        if (iterate === (totalEmojiCount - 1)) {
            continueDraw = true;
            drawConfetti();
            endDraw();
        }
    }
}

function drawConfetti() {
    context.clearRect(0, 0, canvasWidth, canvasHeight);

    emojies.forEach((emoji) => {
        drawEmoji(emoji);
        emoji.y = emoji.y - emoji.count;
    });

    if (this.continueDraw) {
        requestAnimationFrame(this.drawConfetti.bind(this));
    }
}

function drawEmoji(emoji) {
    context.beginPath();
    context.font = emoji.fontSize + 'px serif';
    context.fillText(emoji.emoji, emoji.x, emoji.y);
}

function endDraw() {
    context.clearRect(0, 0, canvasWidth, canvasHeight);
}

initializeCanvas();