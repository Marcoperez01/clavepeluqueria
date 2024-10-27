import React from 'react';
import ReactDOM from 'react-dom';
import UserDashboard from './UserDashboard';

document.addEventListener('DOMContentLoaded', () => {
    ReactDOM.render(
        <UserDashboard />,
        document.getElementById('user-dashboard')
    );
});