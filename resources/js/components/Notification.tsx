import React, { useEffect, useState } from "react";

const Notification: React.FC<{ message: string; details: string }> = ({
    message,
    details,
}) => {
    const [visible, setVisible] = useState<boolean>(true);

    useEffect(() => {
        const timer = setTimeout(() => {
            setVisible(false);
        }, 3000); // Notifikasi hilang setelah 3 detik

        return () => clearTimeout(timer); // Bersihkan timer saat komponen di-unmount
    }, []);

    if (!visible) return null; // Tidak merender jika tidak visible

    return (
        <div
            role="alert"
            className="rounded border-l-4 border-red-500 bg-red-50 p-4"
        >
            <strong className="block font-medium text-red-800">
                {message}
            </strong>
            <p className="mt-2 text-sm text-red-700">{details}</p>
        </div>
    );
};

export default Notification;
