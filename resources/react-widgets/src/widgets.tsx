import React from 'react';
import ReactDOM from 'react-dom/client';
import MappedApp from './entry/MappedApp';

const ReactWidgets = document.querySelectorAll('.reactWidget')
ReactWidgets.forEach(Div => {
    const data = (Div as HTMLElement).dataset as Record<string, string | number>;
    ReactDOM.createRoot(Div).render(
        <React.StrictMode>
            <MappedApp data={data}/>
        </React.StrictMode>
    );
});

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
// reportWebVitals(console.log);
