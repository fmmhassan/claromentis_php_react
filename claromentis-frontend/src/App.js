import './App.css';
import Dashboard from './components/dashboard/dashboard';
require('dotenv').config()

 
function App(){
  console.log('das') // remove this after you've confirmed it working
  console.log(process.env) // remove this after you've confirmed it working
  return(
    <div>
      <Dashboard></Dashboard>
      </div>
  );
}
 
 
export default App;