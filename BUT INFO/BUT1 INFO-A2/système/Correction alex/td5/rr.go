package main

import "sort"

// Ordonnanceur à temps partagé avec politique du tourniquet (Round Robin)
// le quantum vaudra 5 unités de temps
var quantum int = 0

func rr(newTasks []task) (currentTask *task) {
	for i := range newTasks {
		fcfsQueue = append(fcfsQueue, &(newTasks[i]))
	}
	sort.Slice(fcfsQueue, func(i, j int) bool {
		return fcfsQueue[i].Duration > fcfsQueue[j].Duration
	})
	for i := range fcfsQueue {
		if fcfsQueue[i].Duration <= 0 {
			fcfsQueue = fcfsQueue[:i]
		}
	}
	// fmt.Println("---------")
	// for i := range fcfsQueue {
	// 	fmt.Println(fcfsQueue[i])
	// }
	if fcfsCurrentTask == nil || quantum > 4 || fcfsCurrentTask.Duration <= 0 {
		if len(fcfsQueue) > 0 {
			fcfsCurrentTask = fcfsQueue[0]
		} else {
			fcfsCurrentTask = nil
		}
		quantum = 0
	}
	quantum++

	return fcfsCurrentTask
}
