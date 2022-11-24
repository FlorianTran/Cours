package main

import (
	"log"
	"net"
	"time"
)

func main() {
	listener, err := net.Listen("unix", "tmp/test.sock")
	if err != nil {
		log.Println("listen error:", err)
		return
	}
	defer listener.Close()

	conn, err := listener.Accept()
	if err != nil {
		log.Println("accept error:", err)
		return
	}
	defer conn.Close()

	buf := make([]byte, 128)
	_, err = conn.Read(buf)
	if err != nil {
		log.Println("conn.Read", err)
	}
	log.Println(string(buf))

	log.Println("Le client s'est connecté")
	time.Sleep(10 * time.Second)

}
