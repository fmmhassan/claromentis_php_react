import './dashboard.css';
import React, { Component } from 'react';
import Card from '@material-ui/core/Card';
import CardContent from '@material-ui/core/CardContent';
import FileUpload from '../fileUpload/fileUpload';
import ExpensesSummaryTable from '../expensesSummaryTable/expensesSummaryTable';



const exportExpense = process.env.REACT_APP_API_BASE_URL+'request.php?submit=export';
class Dashboard extends Component {
    


    render(){
        
        
        return (
            <div className="container">
                <div className='row'>
                    <h1>Claromentis PHP Developer (Custom Team) Test Task</h1>
                    
                </div>
                <div class="row">
                    <h3>Upload expenses</h3>
                    <FileUpload></FileUpload>
                </div>
                
                <div class="row">
                    <div class="col-md-8">

                        <h3>Expenses Summary Info 
                            </h3>
                    </div>
                    <div class="col-md-4">
                        <a href={exportExpense} target="_blank">Download as CSV</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ExpensesSummaryTable></ExpensesSummaryTable>
                    </div>
                </div>

            </div>
            );
        }
    }
    
 
 
export default Dashboard;