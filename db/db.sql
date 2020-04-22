CREATE DATABASE login;

USE portal;

CREATE TABLE studentDetails(
	username CHAR(15),
	password CHAR(32) NOT NULL,
	firstName VARCHAR(15) NOT NULL,
	lastname VARCHAR(15) NOT NULL,
	otherName VARCHAR(15),
	programme VARCHAR(50) NOT NULL,
	currentMajor VARCHAR(20),
	gender CHAR(7) NOT NULL,
	dateOfBirth CHAR(10) NOT NULL,
	level INT NOT NULL,
	hall VARCHAR(20),
	roomNumber CHAR(5),
	address VARCHAR(30),
	cellPhone CHAR(15) NOT NULL,
	homePhone CHAR(15),
	email VARCHAR(40) NOT NULL,
	homeAddress VARCHAR(30),
	postalAddress VARCHAR(70),
	postalTown VARCHAR(20),
	placeOfBirth VARCHAR(20) NOT NULL,
	homeTown VARCHAR(20) NOT NULL,
	guadianName VARCHAR(30),
	guadianOccupation VARCHAR(20),
	relationWithGuadian VARCHAR(15),
	guadianPhoneNumber CHAR(15),
	country VARCHAR(60) NOT NULL,
	durationOfStudy VARCHAR(35),
	dateOfCommencement CHAR(10) NOT NULL,
	photo VARCHAR(50),
	PRIMARY KEY(indexNumber)
	);


CREATE TABLE students(
						username VARCHAR(15),
						password VARCHAR(32),
						firstname VARCHAR(15),
						lastname VARCHAR(15),
						othername VARCHAR(15),
						gender VARCHAR(7),
						guardianName VARCHAR(30),
						guardianOccupation VARCHAR(20),
						guardianPhone VARCHAR(15),
						relationWithGuadian VARCHAR(20),
						class VARCHAR(10),
						birthdate VARCHAR(15),
						residentialAddress VARCHAR(20),
						postalAddress VARCHAR(60),
						durationOfStudy VARCHAR(15),
						dateOfEnrollment VARCHAR(15),
						PRIMARY KEY(username)
						);


CREATE TABLE employees(
	username VARCHAR(30),
	password CHAR(32) NOT NULL,
	gender CHAR(7),
	firstName VARCHAR(15) NOT NULL,
	lastname VARCHAR(15) NOT NULL,
	otherName VARCHAR(15),
	birthdate VARCHAR(10) NOT NULL,
	phone VARCHAR(30),
	residentialAddress CHAR(30) NOT NULL,
	postalAddress CHAR(70) NOT NULL,
	maritalStatus VARCHAR(10) NOT NULL,
	levelofEducation VARCHAR(20),
	skill VARCHAR(20),
	position VARCHAR(20),
	nextofKin VARCHAR(40) NOT NULL,
	phoneofNextofKin CHAR(15),
	relationwithNextofKin VARCHAR(40),
	ssnitID VARCHAR(20),
	bankName VARCHAR(30),
	bankBrach VARCHAR(20),
	accountNumber VARCHAR(20) NOT NULL,
	startingDate VARCHAR(10) NOT NULL,
	email VARCHAR(60),
	PRIMARY KEY(username)
	);

CREATE TABLE FORM_TWO(
						id INT AUTO_INCREMENT,
						nameofStudent VARCHAR(30),
						vacationDate CHAR(35),
						reopeningDate CHAR(35),
						form CHAR(8),
						term CHAR(6),

						englishClassScore CHAR(2),
						englishExamScore CHAR(2),
						englishTotalScore CHAR(3),
						englishGrade CHAR(1),
						englishRemark CHAR(15),

						scienceClassScore CHAR(2),
						scienceExamScore CHAR(2),
						scienceTotalScore CHAR(3),
						scienceGrade CHAR(1),
						scienceRemark CHAR(15),

						socialCLassScore CHAR(2),
						socialExamScore CHAR(2),
						socialTotalScore CHAR(3),
						socialGrade CHAR(1),
						socialRemark CHAR(15),

						mathematicsClassScore CHAR(2),
						mathematicsExamScore CHAR(2),
						mathematicsTotalScore CHAR(3),
						mathematicsGrade CHAR(1),
						mathematicsRemark CHAR(15),

						RMEClassScore CHAR(2),
						RMEExamScore CHAR(2),
						RMETotalScore CHAR(3),
						RMEGrade CHAR(1),
						RMERemark CHAR(15),

						BDTClassScore CHAR(2),
						BDTExamScore CHAR(2),
						BDTTotalScore CHAR(3),
						BDTGrade CHAR(1),
						BDTRemark CHAR(15),

						ICTClassScore CHAR(2),
						ICTExamScore CHAR(2),
						ICTTotalScore CHAR(3),
						ICTGrade CHAR(1),
						ICTRemark CHAR(15),

						GhanaianLanguageClassScore CHAR(2),
						GhanaianLanguageExamScore CHAR(2),
						GhanaianLanguageTotalScore CHAR(3),
						GhanaianLanguageGrade CHAR(1),
						GhanaianLanguageRemark CHAR(15),

						FrenchClassScore CHAR(2),
						FrenchExamScocre CHAR(2),
						FrenchTotalScore CHAR(3),
						FrenchGrade CHAR(1),
						FrenchRemark CHAR(15),

						Attendance CHAR(3),
						Outof CHAR(3),
						Raw_Score CHAR(3),
						Attitude CHAR(35),
						Conduct CHAR(35),
						Interest CHAR(35),
						Aggregate CHAR(2),
						Academic_Year CHAR(10),
						Teacher_Remark CHAR(35),
						Promoted_Repeated CHAR(10),
						PRIMARY KEY(id)
						);

CREATE TABLE MATHEMATICS(
						maths_id INT AUTO_INCREMENT,
						indexNumber CHAR(15),
						Class CHAR(10),
						ClassScore CHAR(2),
						ExamScore CHAR(2),
						TotalScore CHAR(3),
						Grade CHAR(1),
						Remark CHAR(15),
						PRIMARY KEY(maths_id)
						);

CREATE TABLE SCIENCE(
						username CHAR(15),
						Class CHAR(10),
						ClassScore CHAR(2),
						ExamScore CHAR(2),
						TotalScore CHAR(3),
						Grade CHAR(1),
						Remark CHAR(15),
						PRIMARY KEY(username)
						);

CREATE TABLE ENGLISH(
						english_id INT AUTO_INCREMENT,
						indexNumber CHAR(15),
						Class CHAR(10),
						ClassScore CHAR(2),
						ExamScore CHAR(2),
						TotalScore CHAR(3),
						Grade CHAR(1),
						Remark CHAR(15),
						PRIMARY KEY(english_id)
						);

CREATE TABLE SOCIAL(
						social_id INT AUTO_INCREMENT,
						indexNumber CHAR(15),
						Class CHAR(10),
						ClassScore CHAR(2),
						ExamScore CHAR(2),
						TotalScore CHAR(3),
						Grade CHAR(1),
						Remark CHAR(15),
						PRIMARY KEY(social_id)
						);

CREATE TABLE RME(
						rme_id INT AUTO_INCREMENT,
						indexNumber CHAR(15),
						Class CHAR(10),
						ClassScore CHAR(2),
						ExamScore CHAR(2),
						TotalScore CHAR(3),
						Grade CHAR(1),
						Remark CHAR(15),
						PRIMARY KEY(rme_id)
						);

CREATE TABLE ICT(
						ict_id INT AUTO_INCREMENT,
						indexNumber CHAR(15),
						Class CHAR(10),
						ClassScore CHAR(2),
						ExamScore CHAR(2),
						TotalScore CHAR(3),
						Grade CHAR(1),
						Remark CHAR(15),
						PRIMARY KEY(ict_id)
						);

CREATE TABLE BDT(
						bdt_id INT AUTO_INCREMENT,
						indexNumber CHAR(15),
						Class CHAR(10),
						ClassScore CHAR(2),
						ExamScore CHAR(2),
						TotalScore CHAR(3),
						Grade CHAR(1),
						Remark CHAR(15),
						PRIMARY KEY(bdt_id)
						);

CREATE TABLE GHANAIANLANGUAGE(
						ghlanguage_id INT AUTO_INCREMENT,
						indexNumber CHAR(15),
						Class CHAR(10),
						ClassScore CHAR(2),
						ExamScore CHAR(2),
						TotalScore CHAR(3),
						Grade CHAR(1),
						Remark CHAR(15),
						PRIMARY KEY(ghlanguage_id)
						);

CREATE TABLE FRENCH(
						french_id INT AUTO_INCREMENT,
						indexNumber CHAR(15),
						Class CHAR(10),
						ClassScore CHAR(2),
						ExamScore CHAR(2),
						TotalScore CHAR(3),
						Grade CHAR(1),
						Remark CHAR(15),
						PRIMARY KEY(french_id)
						);

CREATE TABLE sba_users(
						id INT AUTO_INCREMENT,
						username VARCHAR(30),
						password VARCHAR(32),
						firstname VARCHAR(15),
						lastname VARCHAR(15),
						subject VARCHAR(20),
						class VARCHAR(15),
						PRIMARY KEY(id)
						);


CREATE TABLE admin(
					id INT AUTO_INCREMENT,
					username VARCHAR(30),
					password VARCHAR(32),
					firstname VARCHAR(15),
					lastname VARCHAR(15),
					othername VARCHAR(15),
					workstatus VARCHAR(20),
					email VARCHAR(60),
					PRIMARY KEY(id)
					);

CREATE TABLE users(
					id INT AUTO_INCREMENT,
					username VARCHAR(30) NOT NULL,
					password VARCHAR(32) NOT NULL,
					firstname VARCHAR(15) NOT NULL,
					lastname VARCHAR(15) NOT NULL,
					othername VARCHAR(15),
					empID VARCHAR(20),
					email VARCHAR(60),
					PRIMARY KEY(id)
					);

CREATE TABLE fees(
					id INT AUTO_INCREMENT,
					username VARCHAR(15) NOT NULL,
					existingBalance DECIMAL(10,2),
					feesForAcademicYear DECIMAL(10,2),
					paymentMade DECIMAL(10,5),
					balanceCarryForward DECIMAL(10,2),
					PRIMARY KEY(id)
					);

CREATE TABLE timeTable(
						id INT AUTO_INCREMENT,
						subject VARCHAR(20) NOT NULL,
						examDate VARCHAR(20),
						examTime VARCHAR(23) NOT NULL,
						venue VARCHAR(20), 
						PRIMARY KEY(id)
						);

CREATE TABLE formOne(
					    id INT AUTO_INCREMENT,
					    username VARCHAR(15),
					    subject VARCHAR(20) NOT NULL,
						Class CHAR(10),
						ClassScore CHAR(2) NOT NULL,
						ExamScore CHAR(2) NOT NULL,
						TotalScore CHAR(3) NOT NULL,
						Grade CHAR(1) NOT NULL,
						Remark CHAR(15) NOT NULL,
						teacher VARCHAR(15)
					  );