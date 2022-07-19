import { useState, useEffect } from "react";
import axios from 'axios';
require('dotenv').config()


export default function ExpensesSummaryTable() {
 const [expensesSummary, setData] = useState(null);
 const [loading, setLoading] = useState(true);

 useEffect(() => {
    

    setLoading(true);
    axios.get(process.env.REACT_APP_API_BASE_URL+'request.php', {
        params : {
            submit : "getExpensesSummary"
        }
    })
    .then(responseData => {
        setData(responseData.data[0]);
    })
    .finally(() => {
        setLoading(false);
    })
   }, []);
   

   return (
    <div>
      {loading && <div>A moment please...</div>}
      
        <table class="table table-striped">
            <tbody>

                {!loading && expensesSummary &&
                expensesSummary.map(({ id, Category, Amount }) => (
                <tr key={Category}>
                    <th className="align-left table-cell">{Category}</th>
                    <td className="table-cell">{Amount}</td>
                </tr>
                ))}
            </tbody>

        </table>
        
    </div>
  );
}
