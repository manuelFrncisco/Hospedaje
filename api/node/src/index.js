import { http } from 'node:http';

const server = http.createServer((req, res) =>{
    console.log('request received')
    res.end('Hola')
})

server.listen(0, () =>{
    console.log(`servidor listening on port http://localhost:${server.address().port}` )
})