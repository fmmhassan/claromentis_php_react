import axios from 'axios';
import React,{Component} from 'react';
require('dotenv').config()


class FileUpload extends Component {

	state = {

	// Initially, no file is selected
	selectedFile: null
	};
	
	// On file select (from the pop up)
	onFileChange = event => {
	
	// Update the state
	this.setState({ selectedFile: event.target.files[0] });
	
	};
	
	// On file upload (click the upload button)
	onFileUpload = () => {
	
	// Create an object of formData
	const formData = new FormData();
	
	// Update the formData object
	formData.append(
		"file",
		this.state.selectedFile,
		this.state.selectedFile.name
	);
  formData.append('submit', "import")
	
	// Details of the uploaded file
	console.log(this.state.selectedFile);
	
	// Request made to the backend api
	// Send formData object
        axios.post(process.env.REACT_APP_API_BASE_URL+"request.php",
        formData)
        .then(function(success){
            window.location.reload(false);

        })
	};
	
	// File content to be displayed after
	// file upload is complete
	fileData = () => {
	
	if (!this.state.selectedFile) {
		return (
		<div>
			<br />
			<h4>Choose before Pressing the Upload button</h4>
		</div>
		);
	}
	};
	
	render() {
	
	return (
		<div>
			<div>
				<input type="file" onChange={this.onFileChange} />
				<button onClick={this.onFileUpload}>
				Upload!
				</button>
			</div>
		{this.fileData()}
		</div>
	);
	}
}

export default FileUpload;
