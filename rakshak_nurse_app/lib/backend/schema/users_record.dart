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

  // "phone_number" field.
  String? _phoneNumber;
  String get phoneNumber => _phoneNumber ?? '';
  bool hasPhoneNumber() => _phoneNumber != null;

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

  // "specialization" field.
  String? _specialization;
  String get specialization => _specialization ?? '';
  bool hasSpecialization() => _specialization != null;

  // "experience" field.
  int? _experience;
  int get experience => _experience ?? 0;
  bool hasExperience() => _experience != null;

  // "shift" field.
  String? _shift;
  String get shift => _shift ?? '';
  bool hasShift() => _shift != null;

  // "address" field.
  String? _address;
  String get address => _address ?? '';
  bool hasAddress() => _address != null;

  // "aadhar_number" field.
  String? _aadharNumber;
  String get aadharNumber => _aadharNumber ?? '';
  bool hasAadharNumber() => _aadharNumber != null;

  // "aadhar_verified" field.
  bool? _aadharVerified;
  bool get aadharVerified => _aadharVerified ?? false;
  bool hasAadharVerified() => _aadharVerified != null;

  // "display_name" field.
  String? _displayName;
  String get displayName => _displayName ?? '';
  bool hasDisplayName() => _displayName != null;

  // "license_number" field.
  String? _licenseNumber;
  String get licenseNumber => _licenseNumber ?? '';
  bool hasLicenseNumber() => _licenseNumber != null;

  // "charges" field.
  String? _charges;
  String get charges => _charges ?? '';
  bool hasCharges() => _charges != null;

  // "education" field.
  String? _education;
  String get education => _education ?? '';
  bool hasEducation() => _education != null;

  // "gender" field.
  String? _gender;
  String get gender => _gender ?? '';
  bool hasGender() => _gender != null;

  // "password" field.
  String? _password;
  String get password => _password ?? '';
  bool hasPassword() => _password != null;

  // "birth_date" field.
  String? _birthDate;
  String get birthDate => _birthDate ?? '';
  bool hasBirthDate() => _birthDate != null;

  // "nurseLocation" field.
  LatLng? _nurseLocation;
  LatLng? get nurseLocation => _nurseLocation;
  bool hasNurseLocation() => _nurseLocation != null;

  void _initializeFields() {
    _email = snapshotData['email'] as String?;
    _photoUrl = snapshotData['photo_url'] as String?;
    _uid = snapshotData['uid'] as String?;
    _createdTime = snapshotData['created_time'] as DateTime?;
    _phoneNumber = snapshotData['phone_number'] as String?;
    _shortDescription = snapshotData['shortDescription'] as String?;
    _lastActiveTime = snapshotData['last_active_time'] as DateTime?;
    _role = snapshotData['role'] as String?;
    _title = snapshotData['title'] as String?;
    _specialization = snapshotData['specialization'] as String?;
    _experience = castToType<int>(snapshotData['experience']);
    _shift = snapshotData['shift'] as String?;
    _address = snapshotData['address'] as String?;
    _aadharNumber = snapshotData['aadhar_number'] as String?;
    _aadharVerified = snapshotData['aadhar_verified'] as bool?;
    _displayName = snapshotData['display_name'] as String?;
    _licenseNumber = snapshotData['license_number'] as String?;
    _charges = snapshotData['charges'] as String?;
    _education = snapshotData['education'] as String?;
    _gender = snapshotData['gender'] as String?;
    _password = snapshotData['password'] as String?;
    _birthDate = snapshotData['birth_date'] as String?;
    _nurseLocation = snapshotData['nurseLocation'] as LatLng?;
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
  String? photoUrl,
  String? uid,
  DateTime? createdTime,
  String? phoneNumber,
  String? shortDescription,
  DateTime? lastActiveTime,
  String? role,
  String? title,
  String? specialization,
  int? experience,
  String? shift,
  String? address,
  String? aadharNumber,
  bool? aadharVerified,
  String? displayName,
  String? licenseNumber,
  String? charges,
  String? education,
  String? gender,
  String? password,
  String? birthDate,
  LatLng? nurseLocation,
}) {
  final firestoreData = mapToFirestore(
    <String, dynamic>{
      'email': email,
      'photo_url': photoUrl,
      'uid': uid,
      'created_time': createdTime,
      'phone_number': phoneNumber,
      'shortDescription': shortDescription,
      'last_active_time': lastActiveTime,
      'role': role,
      'title': title,
      'specialization': specialization,
      'experience': experience,
      'shift': shift,
      'address': address,
      'aadhar_number': aadharNumber,
      'aadhar_verified': aadharVerified,
      'display_name': displayName,
      'license_number': licenseNumber,
      'charges': charges,
      'education': education,
      'gender': gender,
      'password': password,
      'birth_date': birthDate,
      'nurseLocation': nurseLocation,
    }.withoutNulls,
  );

  return firestoreData;
}

class UsersRecordDocumentEquality implements Equality<UsersRecord> {
  const UsersRecordDocumentEquality();

  @override
  bool equals(UsersRecord? e1, UsersRecord? e2) {
    return e1?.email == e2?.email &&
        e1?.photoUrl == e2?.photoUrl &&
        e1?.uid == e2?.uid &&
        e1?.createdTime == e2?.createdTime &&
        e1?.phoneNumber == e2?.phoneNumber &&
        e1?.shortDescription == e2?.shortDescription &&
        e1?.lastActiveTime == e2?.lastActiveTime &&
        e1?.role == e2?.role &&
        e1?.title == e2?.title &&
        e1?.specialization == e2?.specialization &&
        e1?.experience == e2?.experience &&
        e1?.shift == e2?.shift &&
        e1?.address == e2?.address &&
        e1?.aadharNumber == e2?.aadharNumber &&
        e1?.aadharVerified == e2?.aadharVerified &&
        e1?.displayName == e2?.displayName &&
        e1?.licenseNumber == e2?.licenseNumber &&
        e1?.charges == e2?.charges &&
        e1?.education == e2?.education &&
        e1?.gender == e2?.gender &&
        e1?.password == e2?.password &&
        e1?.birthDate == e2?.birthDate &&
        e1?.nurseLocation == e2?.nurseLocation;
  }

  @override
  int hash(UsersRecord? e) => const ListEquality().hash([
        e?.email,
        e?.photoUrl,
        e?.uid,
        e?.createdTime,
        e?.phoneNumber,
        e?.shortDescription,
        e?.lastActiveTime,
        e?.role,
        e?.title,
        e?.specialization,
        e?.experience,
        e?.shift,
        e?.address,
        e?.aadharNumber,
        e?.aadharVerified,
        e?.displayName,
        e?.licenseNumber,
        e?.charges,
        e?.education,
        e?.gender,
        e?.password,
        e?.birthDate,
        e?.nurseLocation
      ]);

  @override
  bool isValidKey(Object? o) => o is UsersRecord;
}
