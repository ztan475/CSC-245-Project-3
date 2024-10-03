// import packages
const express = require('express');
const bodyParser = require('body-parser');
const fs = require('fs');
const path = require('path');

// set up server
const app = express();
const PORT = 3000;

// Middleware
app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static('public')); // can see/use public dir
app.use('/images', express.static('images')); // access images from the images folder

// runs when first called and sends index.html to correct path
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'public', 'index.html'));
});

// get a random image
app.get('/random-image', (req, res) => {
    const imagesFolder = path.join(__dirname, 'images');
    fs.readdir(imagesFolder, (err, files) => { // read contents of images
        if (err) { // if it cant read director error out
            console.error(err);
            return res.status(500).send('Error reading images folder');
        }
        
        // Filter the image files and only adds jpg/jpeg images to array
        const imageFiles = files.filter(file => /\.(jpg|jpeg)$/i.test(file));
        
        // Select a random image
        const randomImage = imageFiles[Math.floor(Math.random() * imageFiles.length)];
        const imagePath = `/images/${randomImage}`;

        // Send the image path as JSON
        res.json({ imagePath });
    });
});

// Handle form submission
app.post('/submit', (req, res) => {
    const number = req.body.number;
    fs.appendFile('numbers.txt', `${number}\n`, (err) => {
        if (err) {
            console.error(err);
            res.status(500).send('Error saving number');
        } else {
            res.sendFile(path.join(__dirname, 'public', 'index.html'));
            
        }
    });
    
});

// Start the server
app.listen(PORT, () => {
    console.log(`Server running at http://localhost:${PORT}`);
});
