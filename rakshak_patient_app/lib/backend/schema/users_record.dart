import 'dart:async';

import 'package:collection/collection.dart';

import '/backend/schema/util/firestore_util.dart';
import '/backend/schema/util/schema_util.dart';

import 'index.dart';
import '/flutter_flow/flutter_flow_util.dart';

class UsersRecord extends FirestoreRecord {
  UsersRecord._(
    DocumentReference reference,
    Map<String, dynamic> data,
  ) : super(reference, data) {
    _initializeFields();
  }

  // "email" field.
  String? _email;
  String get email => _email ?? '';
  bool hasEmail() => _email != null;

  // "display_name" field.
  String? _displayName;
  String get displayName => _displayName ?? '';
  bool hasDisplayName() => _displayName != null;

  // "photo_url" field.
  String? _photoUrl;
  String get photoUrl => _photoUrl ?? '';
  bool hasPhotoUrl() => _photoUrl != null;

  // "uid" field.
  String? _uid;
  String get uid => _uid ?? '';
  bool hasUid() => _uid != null;

  // "created_time" field.
  DateTime? _createdTime;
  DateTime? get createdTime => _createdTime;
  bool hasCreatedTime() => _createdTime != null;

  // "shortDescription" field.
  String? _shortDescription;
  String get shortDescription => _shortDescription ?? '';
  bool hasShortDescription() => _shortDescription != null;

  // "last_active_time" field.
  DateTime? _lastActiveTime;
  DateTime? get lastActiveTime => _lastActiveTime;
  bool hasLastActiveTime() => _lastActiveTime != null;

  // "role" field.
  String? _role;
  String get role => _role ?? '';
  bool hasRole() => _role != null;

  // "title" field.
  String? _title;
  String get title => _title ?? '';
  bool hasTitle() => _title != null;

  // "age" field.
  int? _age;
  int get age => _age ?? 0;
  bool hasAge() => _age != null;

  // "gender" field.
  String? _gender;
  String get gender => _gender ?? '';
  bool hasGender() => _gender != null;

  // "emergency_contect" field.
  String? _emergencyContect;
  String get emergencyContect => _emergencyContect ?? '';
  bool hasEmergencyContect() => _emergencyContect != null;

  // "address" field.
  String? _address;
  String get address => _address ?? '';
  bool hasAddress() => _address != null;

  // "spacialMediaclCondition" field.
  String? _spacialMediaclCondition;
  String get spacialMediaclCondition => _spacialMediaclCondition ?? '';
  bool hasSpacialMediaclCondition() => _spacialMediaclCondition != null;

  // "medicalHistory" field.
  String? _medicalHistory;
  String get medicalHistory => _medicalHistory ?? '';
  bool hasMedicalHistory() => _medicalHistory != null;

  // "preferredNurseGender" field.
  String? _preferredNurseGender;
  String get preferredNurseGender => _preferredNurseGender ?? '';
  bool hasPreferredNurseGender() => _preferredNurseGender != null;

  // "bloodGroup" field.
  String? _bloodGroup;
  String get bloodGroup => _bloodGroup ?? '';
  bool hasBloodGroup() => _bloodGroup != null;

  // "rugularMedicines" field.
  String? _rugularMedicines;
  String get rugularMedicines => _rugularMedicines ?? '';
  bool hasRugularMedicines() => _rugularMedicines != null;

  // "doctorName" field.
  String? _doctorName;
  String get doctorName => _doctorName ?? '';
  bool hasDoctorName() => _doctorName != null;

  // "doctorContact" field.
  String? _doctorContact;
  String get doctorContact => _doctorContact ?? '';
  bool hasDoctorContact() => _doctorContact != null;

  // "mobilityStatus" field.
  String? _mobilityStatus;
  String get mobilityStatus => _mobilityStatus ?? '';
  bool hasMobilityStatus() => _mobilityStatus != null;

  // "diabetes" field.
  bool? _diabetes;
  bool get diabetes => _diabetes ?? false;
  bool hasDiabetes() => _diabetes != null;

  // "hypertension" field.
  bool? _hypertension;
  bool get hypertension => _hypertension ?? false;
  bool hasHypertension() => _hypertension != null;

  // "phone_number" field.
  String? _phoneNumber;
  String get phoneNumber => _phoneNumber ?? '';
  bool hasPhoneNumber() => _phoneNumber != null;

  // "password" field.
  String? _password;
  String get password => _password ?? '';
  bool hasPassword() => _password != null;

  // "criticalPatients" field.
  String? _criticalPatients;
  String get criticalPatients => _criticalPatients ?? '';
  bool hasCriticalPatients() => _criticalPatients != null;

  // "specialization" field.
  String? _specialization;
  String get specialization => _specialization ?? '';
  bool hasSpecialization() => _specialization != null;

  // "license_number" field.
  String? _licenseNumber;
  String get licenseNumber => _licenseNumber ?? '';
  bool hasLicenseNumber() => _licenseNumber != null;

  // "education" field.
  String? _education;
  String get education => _education ?? '';
  bool hasEducation() => _education != null;

  // "charges" field.
  String? _charges;
  String get charges => _charges ?? '';
  bool hasCharges() => _charges != null;

  // "birth_date" field.
  String? _birthDate;
  String get birthDate => _birthDate ?? '';
  bool hasBirthDate() => _birthDate != null;

  void _initializeFields() {
    _email = snapshotData['email'] as String?;
    _displayName = snapshotData['display_name'] as String?;
    _photoUrl = snapshotData['photo_url'] as String?;
    _uid = snapshotData['uid'] as String?;
    _createdTime = snapshotData['created_time'] as DateTime?;
    _shortDescription = snapshotData['shortDescription'] as String?;
    _lastActiveTime = snapshotData['last_active_time'] as DateTime?;
    _role = snapshotData['role'] as String?;
    _title = snapshotData['title'] as String?;
    _age = castToType<int>(snapshotData['age']);
    _gender = snapshotData['gender'] as String?;
    _emergencyContect = snapshotData['emergency_contect'] as String?;
    _address = snapshotData['address'] as String?;
    _spacialMediaclCondition =
        snapshotData['spacialMediaclCondition'] as String?;
    _medicalHistory = snapshotData['medicalHistory'] as String?;
    _preferredNurseGender = snapshotData['preferredNurseGender'] as String?;
    _bloodGroup = snapshotData['bloodGroup'] as String?;
    _rugularMedicines = snapshotData['rugularMedicines'] as String?;
    _doctorName = snapshotData['doctorName'] as String?;
    _doctorContact = snapshotData['doctorContact'] as String?;
    _mobilityStatus = snapshotData['mobilityStatus'] as String?;
    _diabetes = snapshotData['diabetes'] as bool?;
    _hypertension = snapshotData['hypertension'] as bool?;
    _phoneNumber = snapshotData['phone_number'] as String?;
    _password = snapshotData['password'] as String?;
    _criticalPatients = snapshotData['criticalPatients'] as String?;
    _specialization = snapshotData['specialization'] as String?;
    _licenseNumber = snapshotData['license_number'] as String?;
    _education = snapshotData['education'] as String?;
    _charges = snapshotData['charges'] as String?;
    _birthDate = snapshotData['birth_date'] as String?;
  }

  static CollectionReference get collection =>
      FirebaseFirestore.instance.collection('users');

  static Stream<UsersRecord> getDocument(DocumentReference ref) =>
      ref.snapshots().map((s) => UsersRecord.fromSnapshot(s));

  static Future<UsersRecord> getDocumentOnce(DocumentReference ref) =>
      ref.get().then((s) => UsersRecord.fromSnapshot(s));

  static UsersRecord fromSnapshot(DocumentSnapshot snapshot) => UsersRecord._(
        snapshot.reference,
        mapFromFirestore(snapshot.data() as Map<String, dynamic>),
      );

  static UsersRecord getDocumentFromData(
    Map<String, dynamic> data,
    DocumentReference reference,
  ) =>
      UsersRecord._(reference, mapFromFirestore(data));

  @override
  String toString() =>
      'UsersRecord(reference: ${reference.path}, data: $snapshotData)';

  @override
  int get hashCode => reference.path.hashCode;

  @override
  bool operator ==(other) =>
      other is UsersRecord &&
      reference.path.hashCode == other.reference.path.hashCode;
}

Map<String, dynamic> createUsersRecordData({
  String? email,
  String? displayName,
  String? photoUrl,
  String? uid,
  DateTime? createdTime,
  String? shortDescription,
  DateTime? lastActiveTime,
  String? role,
  String? title,
  int? age,
  String? gender,
  String? emergencyContect,
  String? address,
  String? spacialMediaclCondition,
  String? medicalHistory,
  String? preferredNurseGender,
  String? bloodGroup,
  String? rugularMedicines,
  String? doctorName,
  String? doctorContact,
  String? mobilityStatus,
  bool? diabetes,
  bool? hypertension,
  String? phoneNumber,
  String? password,
  String? criticalPatients,
  String? specialization,
  String? licenseNumber,
  String? education,
  String? charges,
  String? birthDate,
}) {
  final firestoreData = mapToFirestore(
    <String, dynamic>{
      'email': email,
      'display_name': displayName,
      'photo_url': photoUrl,
      'uid': uid,
      'created_time': createdTime,
      'shortDescription': shortDescription,
      'last_active_time': lastActiveTime,
      'role': role,
      'title': title,
      'age': age,
      'gender': gender,
      'emergency_contect': emergencyContect,
      'address': address,
      'spacialMediaclCondition': spacialMediaclCondition,
      'medicalHistory': medicalHistory,
      'preferredNurseGender': preferredNurseGender,
      'bloodGroup': bloodGroup,
      'rugularMedicines': rugularMedicines,
      'doctorName': doctorName,
      'doctorContact': doctorContact,
      'mobilityStatus': mobilityStatus,
      'diabetes': diabetes,
      'hypertension': hypertension,
      'phone_number': phoneNumber,
      'password': password,
      'criticalPatients': criticalPatients,
      'specialization': specialization,
      'license_number': licenseNumber,
      'education': education,
      'charges': charges,
      'birth_date': birthDate,
    }.withoutNulls,
  );

  return firestoreData;
}

class UsersRecordDocumentEquality implements Equality<UsersRecord> {
  const UsersRecordDocumentEquality();

  @override
  bool equals(UsersRecord? e1, UsersRecord? e2) {
    return e1?.email == e2?.email &&
        e1?.displayName == e2?.displayName &&
        e1?.photoUrl == e2?.photoUrl &&
        e1?.uid == e2?.uid &&
        e1?.createdTime == e2?.createdTime &&
        e1?.shortDescription == e2?.shortDescription &&
        e1?.lastActiveTime == e2?.lastActiveTime &&
        e1?.role == e2?.role &&
        e1?.title == e2?.title &&
        e1?.age == e2?.age &&
        e1?.gender == e2?.gender &&
        e1?.emergencyContect == e2?.emergencyContect &&
        e1?.address == e2?.address &&
        e1?.spacialMediaclCondition == e2?.spacialMediaclCondition &&
        e1?.medicalHistory == e2?.medicalHistory &&
        e1?.preferredNurseGender == e2?.preferredNurseGender &&
        e1?.bloodGroup == e2?.bloodGroup &&
        e1?.rugularMedicines == e2?.rugularMedicines &&
        e1?.doctorName == e2?.doctorName &&
        e1?.doctorContact == e2?.doctorContact &&
        e1?.mobilityStatus == e2?.mobilityStatus &&
        e1?.diabetes == e2?.diabetes &&
        e1?.hypertension == e2?.hypertension &&
        e1?.phoneNumber == e2?.phoneNumber &&
        e1?.password == e2?.password &&
        e1?.criticalPatients == e2?.criticalPatients &&
        e1?.specialization == e2?.specialization &&
        e1?.licenseNumber == e2?.licenseNumber &&
        e1?.education == e2?.education &&
        e1?.charges == e2?.charges &&
        e1?.birthDate == e2?.birthDate;
  }

  @override
  int hash(UsersRecord? e) => const ListEquality().hash([
        e?.email,
        e?.displayName,
        e?.photoUrl,
        e?.uid,
        e?.createdTime,
        e?.shortDescription,
        e?.lastActiveTime,
        e?.role,
        e?.title,
        e?.age,
        e?.gender,
        e?.emergencyContect,
        e?.address,
        e?.spacialMediaclCondition,
        e?.medicalHistory,
        e?.preferredNurseGender,
        e?.bloodGroup,
        e?.rugularMedicines,
        e?.doctorName,
        e?.doctorContact,
        e?.mobilityStatus,
        e?.diabetes,
        e?.hypertension,
        e?.phoneNumber,
        e?.password,
        e?.criticalPatients,
        e?.specialization,
        e?.licenseNumber,
        e?.education,
        e?.charges,
        e?.birthDate
      ]);

  @override
  bool isValidKey(Object? o) => o is UsersRecord;
}
