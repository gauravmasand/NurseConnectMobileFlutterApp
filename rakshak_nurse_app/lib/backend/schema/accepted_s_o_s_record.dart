import 'dart:async';

import 'package:collection/collection.dart';

import '/backend/schema/util/firestore_util.dart';
import '/backend/schema/util/schema_util.dart';

import 'index.dart';
import '/flutter_flow/flutter_flow_util.dart';

class AcceptedSOSRecord extends FirestoreRecord {
  AcceptedSOSRecord._(
    DocumentReference reference,
    Map<String, dynamic> data,
  ) : super(reference, data) {
    _initializeFields();
  }

  // "coordinates" field.
  LatLng? _coordinates;
  LatLng? get coordinates => _coordinates;
  bool hasCoordinates() => _coordinates != null;

  // "phoneNumber" field.
  String? _phoneNumber;
  String get phoneNumber => _phoneNumber ?? '';
  bool hasPhoneNumber() => _phoneNumber != null;

  // "name" field.
  String? _name;
  String get name => _name ?? '';
  bool hasName() => _name != null;

  // "uid" field.
  String? _uid;
  String get uid => _uid ?? '';
  bool hasUid() => _uid != null;

  // "criticalCondition" field.
  bool? _criticalCondition;
  bool get criticalCondition => _criticalCondition ?? false;
  bool hasCriticalCondition() => _criticalCondition != null;

  // "time" field.
  DateTime? _time;
  DateTime? get time => _time;
  bool hasTime() => _time != null;

  // "nurseId" field.
  String? _nurseId;
  String get nurseId => _nurseId ?? '';
  bool hasNurseId() => _nurseId != null;

  // "referenceForAcceptedSOS" field.
  DocumentReference? _referenceForAcceptedSOS;
  DocumentReference? get referenceForAcceptedSOS => _referenceForAcceptedSOS;
  bool hasReferenceForAcceptedSOS() => _referenceForAcceptedSOS != null;

  void _initializeFields() {
    _coordinates = snapshotData['coordinates'] as LatLng?;
    _phoneNumber = snapshotData['phoneNumber'] as String?;
    _name = snapshotData['name'] as String?;
    _uid = snapshotData['uid'] as String?;
    _criticalCondition = snapshotData['criticalCondition'] as bool?;
    _time = snapshotData['time'] as DateTime?;
    _nurseId = snapshotData['nurseId'] as String?;
    _referenceForAcceptedSOS =
        snapshotData['referenceForAcceptedSOS'] as DocumentReference?;
  }

  static CollectionReference get collection =>
      FirebaseFirestore.instance.collection('AcceptedSOS');

  static Stream<AcceptedSOSRecord> getDocument(DocumentReference ref) =>
      ref.snapshots().map((s) => AcceptedSOSRecord.fromSnapshot(s));

  static Future<AcceptedSOSRecord> getDocumentOnce(DocumentReference ref) =>
      ref.get().then((s) => AcceptedSOSRecord.fromSnapshot(s));

  static AcceptedSOSRecord fromSnapshot(DocumentSnapshot snapshot) =>
      AcceptedSOSRecord._(
        snapshot.reference,
        mapFromFirestore(snapshot.data() as Map<String, dynamic>),
      );

  static AcceptedSOSRecord getDocumentFromData(
    Map<String, dynamic> data,
    DocumentReference reference,
  ) =>
      AcceptedSOSRecord._(reference, mapFromFirestore(data));

  @override
  String toString() =>
      'AcceptedSOSRecord(reference: ${reference.path}, data: $snapshotData)';

  @override
  int get hashCode => reference.path.hashCode;

  @override
  bool operator ==(other) =>
      other is AcceptedSOSRecord &&
      reference.path.hashCode == other.reference.path.hashCode;
}

Map<String, dynamic> createAcceptedSOSRecordData({
  LatLng? coordinates,
  String? phoneNumber,
  String? name,
  String? uid,
  bool? criticalCondition,
  DateTime? time,
  String? nurseId,
  DocumentReference? referenceForAcceptedSOS,
}) {
  final firestoreData = mapToFirestore(
    <String, dynamic>{
      'coordinates': coordinates,
      'phoneNumber': phoneNumber,
      'name': name,
      'uid': uid,
      'criticalCondition': criticalCondition,
      'time': time,
      'nurseId': nurseId,
      'referenceForAcceptedSOS': referenceForAcceptedSOS,
    }.withoutNulls,
  );

  return firestoreData;
}

class AcceptedSOSRecordDocumentEquality implements Equality<AcceptedSOSRecord> {
  const AcceptedSOSRecordDocumentEquality();

  @override
  bool equals(AcceptedSOSRecord? e1, AcceptedSOSRecord? e2) {
    return e1?.coordinates == e2?.coordinates &&
        e1?.phoneNumber == e2?.phoneNumber &&
        e1?.name == e2?.name &&
        e1?.uid == e2?.uid &&
        e1?.criticalCondition == e2?.criticalCondition &&
        e1?.time == e2?.time &&
        e1?.nurseId == e2?.nurseId &&
        e1?.referenceForAcceptedSOS == e2?.referenceForAcceptedSOS;
  }

  @override
  int hash(AcceptedSOSRecord? e) => const ListEquality().hash([
        e?.coordinates,
        e?.phoneNumber,
        e?.name,
        e?.uid,
        e?.criticalCondition,
        e?.time,
        e?.nurseId,
        e?.referenceForAcceptedSOS
      ]);

  @override
  bool isValidKey(Object? o) => o is AcceptedSOSRecord;
}
