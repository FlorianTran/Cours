package main

import (
	"log"
	"net"
)

func main() {

	conn, err := net.Dial("unix", "test.sock")
	if err != nil {
		log.Println("Dial error:", err)
		return
	}
	defer conn.Close()

	conn.Write([]byte("salam"))
	log.Println("Je suis connecté")

}
