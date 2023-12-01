
function getMemberData(userId){

    // AJAX request to fetch member details from the server
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        const memberDetails = JSON.parse(xhr.responseText);
        displayMemberDetails(memberDetails);
        //alert("Member details retrieved successfully!");
        } else if (xhr.readyState === 4 && xhr.status !== 200) {
        alert("Error retrieving member details. Please try again later.");
      }
    };
    xhr.open('GET', `../controller/getMemberDetails.php?userId=${userId}`, true);
    xhr.send();

    // alert("This is Update Member Id: " + userId);
    // Show the member profile card
    const memberProfileCard = document.getElementById("memberProfile");
    memberProfileCard.style.display = "block";
}

function displayMemberDetails(details) {

    // Get the input fields
    const memberTitle = document.getElementById('memberTitle');
    const memberAcc = document.getElementById('memberAcc');
    const firstNameInput = document.getElementById('firstNameInput');
    const lastNameInput = document.getElementById('lastNameInput');
    const emailInput = document.getElementById('emailInput');
    const passwordInput = document.getElementById('passwordInput');
    const userIdInput = document.getElementById('userIdInput');
    const roleIdInput = document.getElementById('roleIdInput');
    
    // Set the values from the query result
    firstNameInput.value = details.firstName;
    lastNameInput.value = details.lastName;
    emailInput.value = details.email;
    passwordInput.value = details.password;
    roleIdInput.value = details.roleID;
    userIdInput.value = details.userID;

    // Update the member title and account type
    memberTitle.textContent = details.firstName + ' ' + details.lastName;
    memberAcc.textContent = details.accType;
  }


  function deleteMemberDatas(userId) {
    var confirmation = confirm("Are you sure you want to delete this member?");
    if (confirmation) {
      // AJAX request to delete member data
      const xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.code === 200) {
              // Deletion successful, reload the page
              location.reload();
            } else if (response.code === 400) {
              // Deletion failed, show the error description
              if (response.description === 'constraint') {
                alert("Error deleting member. The member is associated with other data and cannot be deleted.");
              } else {
                alert("Error deleting member. Please try again later.");
              }
            } else {
              // Other response codes, show a generic error message
              alert("Error deleting member. Please try again later.");
            }
          } else {
            // Error handling for non-200 status codes
            alert("Error deleting member. Please try again later.");
          }
        }
      };
      xhr.open("GET", `../model/membership/membershipDelete.php?userId=${userId}`, true);
      xhr.send();
    }
  }
  
  
  

  //====================================================================================
  //Resources JS

  function getResourcesData(resourcesId){

    // AJAX request to fetch member details from the server
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        const resourcesDetails = JSON.parse(xhr.responseText);
        displayResourcesDetails(resourcesDetails);
        // alert("Member details retrieved successfully!");
        } else if (xhr.readyState === 4 && xhr.status !== 200) {
        alert("Error retrieving member details. Please try again later.");
      }
    };
    xhr.open('GET', `../controller/getResourcesDetails.php?resourcesId=${resourcesId}`, true);
    xhr.send();
}

function displayResourcesDetails(details) {

  // Get the input fields
  const titleInput = document.getElementById('titleInput');
  const typeInput = document.getElementById('typeInput');
  const descriptionsInput = document.getElementById('descriptionsInput');
  const resourcesIdInput = document.getElementById('resourcesIdInput');
  const oldFileName = document.getElementById('oldFileName');
  
  // Set the values from the query result
  titleInput.value = details.title;
  typeInput.value = details.type;
  descriptionsInput.value = details.description;
  resourcesIdInput.value = details.resourcesID;
  oldFileName.value = details.fileName;
}

function deleteResourcesDatas(resourcesId){
  var confirmation = confirm("Are you sure you want to delete this member?");
  if (confirmation) {

  //AJAX request to delete member data
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Success message
      // alert("Resources deleted successfully!");

      // Reload the page
      location.reload();
    } else if (xhr.readyState === 4 && xhr.status !== 200) {
      // Error message
      alert("Error deleting member. Please try again later.");
    }
  };
  xhr.open('GET', `../model/resources/resourcesDelete.php?resourcesId=${resourcesId}`, true);
  xhr.send();
  }
}

//====================================================================================
//Workshop JS

function getWorkshopData(workshopId){

  // AJAX request to fetch member details from the server
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const workshopDetails = JSON.parse(xhr.responseText);
      displayWorkshopDetails(workshopDetails);
      // alert("workshop details retrieved successfully!");
      } else if (xhr.readyState === 4 && xhr.status !== 200) {
      alert("Error retrieving member details. Please try again later.");
    }
  };
  xhr.open('GET', `../controller/getWorkshopDetails.php?workshopId=${workshopId}`, true);
  xhr.send();
}

function displayWorkshopDetails(details) {
// Get the input fields
const titleInput = document.getElementById('titleInput');
const dateInput = document.getElementById('dateInput');
const locationInput = document.getElementById('locationInput');
const descriptionsInput = document.getElementById('descriptionsInput');
const workshopIdInput = document.getElementById('workshopIdInput');

// Set the values from the query result
titleInput.value = details.title;
dateInput.value = details.date;
locationInput.value = details.location;
descriptionsInput.value = details.description;
workshopIdInput.value = details.workshopID;
}

function deleteWorkshopDatas(workshopId){
  var confirmation = confirm("Are you sure you want to delete this member?");
  if (confirmation) {

  //AJAX request to delete member data
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Success message
      // alert("Workshop deleted successfully!");

      // Reload the page
      location.reload();
    } else if (xhr.readyState === 4 && xhr.status !== 200) {
      // Error message
      alert("Error deleting member. Please try again later.");
    }
  };
  xhr.open('GET', `../model/workshop/workshopDelete.php?workshopId=${workshopId}`, true);
  xhr.send();
  }
}


//====================================================================================
//Coach JS

function getCoachData(coachId){

  // AJAX request to fetch member details from the server
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const coachDetails = JSON.parse(xhr.responseText);
      displayCoachDetails(coachDetails);
      // alert("workshop details retrieved successfully!");
      } else if (xhr.readyState === 4 && xhr.status !== 200) {
      alert("Error retrieving member details. Please try again later.");
    }
  };
  xhr.open('GET', `../controller/getCoachDetails.php?coachId=${coachId}`, true);
  xhr.send();

}

function displayCoachDetails(details) {
// Get the input fields
const nameInput = document.getElementById('nameInput');
const specInput = document.getElementById('specInput');
const emailInput = document.getElementById('emailInput');
const contactInput = document.getElementById('contactInput');
const coachIdInput = document.getElementById('coachIdInput');

// Set the values from the query result
nameInput.value = details.name;
specInput.value = details.specialization;
emailInput.value = details.email;
contactInput.value = details.contactNumber;
coachIdInput.value = details.coachID;

}

function deleteCoachDatas(coachId){
  var confirmation = confirm("Are you sure you want to delete this coach?");
  if (confirmation) {

  //AJAX request to delete member data
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Success message
      // alert("Coach deleted successfully!");

      // Reload the page
      location.reload();
    } else if (xhr.readyState === 4 && xhr.status !== 200) {
      // Error message
      alert("Error deleting member. Please try again later.");
    }
  };
  xhr.open('GET', `../model/coach/coachDelete.php?coachId=${coachId}`, true);
  xhr.send();
  }
}

//====================================================================================
//Class JS

function getClassData(classId, date, sessionId, coachId){

  // AJAX request to fetch member details from the server
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const classDetails = JSON.parse(xhr.responseText);
      displayClassDetails(classDetails);
      // alert("class details retrieved successfully!");
      } else if (xhr.readyState === 4 && xhr.status !== 200) {
      alert("Error retrieving class details. Please try again later.");
    }
  };
  xhr.open('GET', `../controller/getClassDetails.php?classId=${classId}&date=${date}&sessionId=${sessionId}&coachId=${coachId}`, true);
  xhr.send();
}

function displayClassDetails(details) {
  // Get the input fields
  const classCoach = document.getElementById('classCoach');
  const specialization = document.getElementById('specialization');
  // const classDate = document.getElementById('classDate');
  const dateInput = document.getElementById('dateInput');
  const timeInput = document.getElementById('timeInput');
  const memberName = document.getElementById('memberName');
  const memberNamesContainer = document.getElementById('memberNames');
  const classIdInput = document.getElementById('classIdInput');

  // Set the values from the query result
  dateInput.value = details.classDetails[0].date;
  classIdInput.value = details.classDetails[0].classID;

  // Update the member title and account type
  classCoach.textContent = details.classDetails[0].coachName;
  // classDate.textContent = details.classDetails[0].date;
  specialization.textContent = details.classDetails[0].specialization;

  // Clear the memberNames container
  memberNamesContainer.innerHTML = '';
  
  // Loop through the memberName values
  for (let i = 0; i < details.memberNames.length; i++) {
    const memberName = details.memberNames[i];
    
    // Create a new <p> element for each memberName
    const memberNameElement = document.createElement('p');
    memberNameElement.textContent = memberName;
    
    // Append the memberName element to the memberNames container
    memberNamesContainer.appendChild(memberNameElement);
  }

  // Set the selected option in timeInput
  for (let i = 0; i < timeInput.options.length; i++) {
    const option = timeInput.options[i];
    if (option.value === details.classDetails[0].classTime) {
      option.selected = true;
      break;
    }
  }
}
