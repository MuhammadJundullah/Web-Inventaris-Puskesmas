// resources/js/components/Notification.jsx
import React, { useEffect, useState } from "react";

const Notification = () => {
    const [showNotification, setShowNotification] = useState(false);
    const [message, setMessage] = useState("");

    useEffect(() => {
        if (window.failed) {
            setMessage(window.message);
            setShowNotification(true);
            setTimeout(() => {
                setShowNotification(false);
            }, 3000);
        }
    }, []);

    return (
        <>
            {showNotification && (
                <div
                    role="alert"
                    className="rounded border-s-4 border-red-500 bg-red-50 p-4"
                >
                    <strong className="block font-medium text-red-800">
                        Something went wrong
                    </strong>
                    <p className="mt-2 text-sm text-red-700">{message}</p>
                </div>
            )}
        </>
    );
};

export default Notification;
