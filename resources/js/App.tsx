import React, { useEffect, useState } from "react";

declare global {
    interface Window {
        sessionMessage: string | null;
    }
}

const Notification: React.FC<{ message: string }> = ({ message }) => {
    return (
        <div
            role="alert"
            className="rounded border-s-4 border-red-500 bg-red-50 p-4"
        >
            <strong className="block font-medium text-red-800">
                Something went wrong
            </strong>
            <p className="mt-2 text-sm text-red-700">{message}</p>
        </div>
    );
};

const App: React.FC = () => {
    const [showMessage, setShowMessage] = useState<boolean>(false);
    const [message, setMessage] = useState<string>("");

    useEffect(() => {
        console.log("Session Message:", window.sessionMessage); // Tambahkan ini untuk debugging
        if (window.sessionMessage) {
            setMessage(window.sessionMessage);
            setShowMessage(true);
            setTimeout(() => setShowMessage(false), 3000);
        }
    }, []);

    return <div>{showMessage && <Notification message={message} />}</div>;
};

export default App;
