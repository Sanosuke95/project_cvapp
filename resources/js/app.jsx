import React, { useEffect } from "react";
import ReactDom from "react-dom/client";
import instance from "./utils/axios";

function Hello() {
    useEffect(() => {
        instance.get("/example").then(function (response) {
            console.log(response.data);
        });
    }, []);

    return <h1>Hello World</h1>;
}

const container = document.getElementById("root");
const root = ReactDom.createRoot(container);
root.render(<Hello />);
