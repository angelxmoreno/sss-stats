import {createContext, FC, PropsWithChildren, useContext} from "react"
import {CounterStore} from "./CounterStore";

const CounterContext = createContext<CounterStore>(undefined!);
export const useCounter = () => useContext(CounterContext);
export const CounterProvider: FC<PropsWithChildren> = ({children}) => {

    return (
        <CounterContext.Provider value={new CounterStore()}>
            {children}
        </CounterContext.Provider>
    );
}
