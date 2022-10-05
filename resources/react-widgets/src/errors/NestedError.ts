export class NestedError extends Error {
    previousError: Error | undefined;

    constructor(message?: string, previousError: Error | undefined = undefined) {
        super(message);
        this.previousError = previousError
    }
}
