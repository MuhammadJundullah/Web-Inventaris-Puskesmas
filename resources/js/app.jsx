import "./bootstrap";
import "./custom";

// resources/js/app.js
import React from "react";
import ReactDOM from "react-dom";
import Notification from "./components/Notification";

if (document.getElementById("root")) {
    ReactDOM.render(<Notification />, document.getElementById("root"));
}
