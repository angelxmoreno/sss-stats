import React from 'react';
import ReactDOM from 'react-dom/client';
import Component from '{{ componentPath }}'

const selector = '{{selector}}';
const ReactWidgets = document.querySelectorAll(selector);

ReactWidgets.forEach(Div => {
    const data = (Div as HTMLElement).dataset as Record<string, string | number>;
    ReactDOM.createRoot(Div).render(
        <React.StrictMode>
            <Component {...data}/>
        </React.StrictMode>
    );
});

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
// reportWebVitals(console.log);
