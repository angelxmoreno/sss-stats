import {makeAutoObservable} from "mobx";

export class CounterStore {
    count = 0

    constructor() {
        makeAutoObservable(this)
    }

    increment() {
        this.count++
    }

    decrement() {
        this.count--
    }

    reset() {
        this.count = 0
    }
}
