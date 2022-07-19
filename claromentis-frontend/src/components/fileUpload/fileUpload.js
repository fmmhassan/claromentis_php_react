import axios from 'axios';
import React,{Component} from 'react';

require('dotenv').config()


class FileUpload extends Component {
	state = {
		selectedFile: null,
		errorMessage : '',
	};
	onFileChange = event => {
		this.setState({ selectedFile: event.target.files[0] });
	};
	
	onFileUpload = () => {
		let vm = this;
		// Create an object of formData
		const formData = new FormData();
		formData.append(
			"file",
			this.state.selectedFile,
		);
  		formData.append('submit', "import")
	
        axios.post(process.env.REACT_APP_API_BASE_URL+"request.php",
        formData)
        .then(function(responseData){
			if(responseData.data[1] === 422){
				vm.setState({ errorMessage: responseData.data[0][0] });
			}
			else if(responseData.data[1] === 200){
				vm.setState({ errorMessage: '' });
				window.location.reload(false);
			}
        })
	};
	
	// File content to be displayed after
	// file upload is complete
	fileData = () => {
	
	if (!!this.state.errorMessage) {
		return (
			
			<div class='alert alert-danger' role="alert">
				{this.state.errorMessage}
			</div>
  
		);
	}
	};
	
	render() {
	
	return (
		<div class="col-md-5">
			<div class="row">
				<div class="col-md-12">
					<div class="input-group mb-3">
						<input type="file" onChange={this.onFileChange} class="form-control"/>
						<button onClick={this.onFileUpload} class="btn btn-outline-secondary">Upload!</button>
					</div>
					{this.fileData()}
				</div>
			</div>
			
		</div>
	);
	}
}

export default FileUpload;
