console.log("hello");

import "./bootstrap";
import "./custom";

import React from "react";
import ReactDOM from "react-dom";
import App from "./App";

if (document.getElementById("app")) {
    ReactDOM.render(<App />, document.getElementById("app"));
}
