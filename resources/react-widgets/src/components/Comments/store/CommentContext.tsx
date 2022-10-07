import {createContext, FC, PropsWithChildren, useContext} from "react";
import {CommentsProps} from "../types";
import {CommentsStore} from "./CommentsStore";
import {configure} from "mobx";

configure({
    useProxies: 'always',
    enforceActions: 'always',
    computedRequiresReaction: true,
    reactionRequiresObservable: true,
    disableErrorBoundaries: false,
    observableRequiresReaction: true,
    safeDescriptors: true,
})
const CommentsCtx = createContext<CommentsStore>(undefined!);
export const useCommentsCtx = () => useContext(CommentsCtx);

export const CommentsCtxProvider: FC<PropsWithChildren<{ initValues: CommentsProps }>> = ({children, initValues}) => {
    const store = new CommentsStore(initValues);

    return (

        <CommentsCtx.Provider value={store}>
            {children}
        </CommentsCtx.Provider>
    );
}
