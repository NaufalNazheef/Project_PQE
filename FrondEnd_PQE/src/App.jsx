import { Routes } from "react-router-dom";
import Login from "./Login";

function App() {
  return (
    <>
      <div
        className="text-white h-[100vh] flex justify-center items-center bg-cover bg-center"
        style={{
          backgroundImage: "url(../src/assets/dashboardLogin.png)",
          backgroundSize: "88%",
          backgroundRepeat: "no-repeat",
        }}
      >
        <Login />
        <Routes path="login" element={<Login />}></Routes>
      </div>
    </>
  );
}

export default App;
