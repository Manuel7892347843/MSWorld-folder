// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.13.1/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.13.1/firebase-analytics.js";
import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/10.13.1/firebase-auth.js";
import { getFirestore, setDoc, doc } from "https://www.gstatic.com/firebasejs/10.13.1/firebase-firestore.js";

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyBLeQRA0npTu0JMFtXkIkoe_17pRjzh4ko",
  authDomain: "msworld-login-auth.firebaseapp.com",
  projectId: "msworld-login-auth",
  storageBucket: "msworld-login-auth.appspot.com",
  messagingSenderId: "514983989548",
  appId: "1:514983989548:web:ec03fa60f3a15e5678dc89",
  measurementId: "G-5D8X4CE362"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);

function showMessage(message, divId) {
    var messageDiv = document.getElementById(divId);
    messageDiv.style.display = "block";
    messageDiv.innerHTML = message;
    messageDiv.style.opacity = 1;
    setTimeout(function () {
        messageDiv.style.opacity = 0;
    }, 5000);
}

const signIn = document.getElementById('rSubmitLogin');
signIn.addEventListener('click', (event) => {
    event.preventDefault();
    const email = document.getElementById('rEmail').value;
    const password = document.getElementById('rPassword').value;
    const auth = getAuth(); // Corretto "aut" in "auth"

    signInWithEmailAndPassword(auth, email, password) // Corretto "aut" in "auth"
        .then((userCredential) => {
            if(email == 'admin@gmail.com' && password == 'admin2420.')
            {
                showMessage('Login is successful as Admin', 'signInMessage');
                const user = userCredential.user;
                localStorage.setItem('loggedInUserId', user.uid); // Corretto "loogedInUserId" in "loggedInUserId"
                window.location.href = 'index.html';
            }
            else
            {
                showMessage('Login is successful', 'signInMessage');
                const user = userCredential.user;
                localStorage.setItem('loggedInUserId', user.uid); // Corretto "loogedInUserId" in "loggedInUserId"
                window.location.href = 'index.html';
            }
        })
        .catch((error) => {
            const errorCode = error.code;
            if (errorCode === 'auth/wrong-password' || errorCode === 'auth/user-not-found') {
                showMessage('Incorrect Email or Password', 'signInMessage');
            } else {
                showMessage('Account does not Exist', 'signInMessage');
            }
        });
});