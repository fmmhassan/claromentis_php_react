import './dashboard.css';
import React, { Component } from 'react';
import Card from '@material-ui/core/Card';
import CardContent from '@material-ui/core/CardContent';
import FileUpload from '../../core/fileUpload/fileUpload';
import ExpensesSummaryTable from '../expensesSummaryTable/expensesSummaryTable';



const exportExpense = process.env.REACT_APP_API_BASE_URL+'request.php?submit=export';
class Dashboard extends Component {
    


    render(){
        
        
        return (
            <div className="card">
                <Card>
                    <CardContent>
                        <h1>Claromentis PHP Developer (Custom Team) Test Task</h1>
                        <h3>Expenses Summary Info</h3>
                        <ExpensesSummaryTable></ExpensesSummaryTable>
                        
                        Download the data as CSV: <a href={exportExpense} target="_blank">Download</a>
                        
                        

                        <h3>Upload expenses</h3>
                        <FileUpload></FileUpload>
                        
                    </CardContent>
                
                </Card>
            </div>
            );
        }
    }
    
 
 
export default Dashboard;