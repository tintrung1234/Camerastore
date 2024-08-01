const http = require('http');
const url = require('url');
const fs = require('fs');
const mysql = require('mysql');

const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '', // XAMPP MySQL default user does not have a password, if you set one, add it here.
    database: 'ecommerce'
});

db.connect(err => {
    if (err) throw err;
    console.log('MySQL connected...');
});

const server = http.createServer((req, res) => {
    const parsedUrl = url.parse(req.url, true);
    const pathname = parsedUrl.pathname;

    if (req.method === 'POST' && pathname === '/api/store-cart') {
        let body = '';

        req.on('data', chunk => {
            body += chunk.toString();
        });

        req.on('end', () => {
            const cart = JSON.parse(body);
            cart.forEach(product => {
                const { id, title, price, quantity } = product;
                const sql = 'INSERT INTO cart (product_id, title, price, quantity) VALUES (?, ?, ?, ?)';
                db.query(sql, [id, title, price, quantity], (err, result) => {
                    if (err) throw err;
                    console.log('Product added to cart:', result.insertId);
                });
            });
            res.writeHead(200, { 'Content-Type': 'application/json' });
            res.end(JSON.stringify({ message: 'Cart stored successfully' }));
        });
    } else {
        let filePath = '../camerastore' + pathname;
        if (filePath === '../camerastore/') {
            filePath = '../camerastore/home.html';
        }

        fs.readFile(filePath, (err, data) => {
            if (err) {
                res.writeHead(404);
                res.end(JSON.stringify(err));
                return;
            }
            res.writeHead(200);
            res.end(data);
        });
    }
});

server.listen(3000, () => {
    console.log('Server running at http://localhost:3000/');
});
