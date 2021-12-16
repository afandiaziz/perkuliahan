<?php
$data = json_decode(file_get_contents('./data.json'));
$data[] = [
    'nim' => 1907411020,
    'name' => 'Rizki',
    'kelas' => 'TI 5B',
    'prodi' => 'TI',
    'jurusan' => 'TIK'
];
$data[] = [
    'nim' => 1907411021,
    'name' => 'Hani',
    'kelas' => 'TI 5A',
    'prodi' => 'TI',
    'jurusan' => 'TIK'
];
$data[] = [
    'nim' => 1907411022,
    'name' => 'Sultan',
    'kelas' => 'TI 5A',
    'prodi' => 'TI',
    'jurusan' => 'TIK'
];
$data[] = [
    'nim' => 1907411023,
    'name' => 'Misbah',
    'kelas' => 'TI 5B',
    'prodi' => 'TI',
    'jurusan' => 'TIK'
];
$data[] = [
    'nim' => 1907411024,
    'name' => 'Nanda',
    'kelas' => 'TI 5B',
    'prodi' => 'TI',
    'jurusan' => 'TIK'
];
file_put_contents('./data.json', json_encode($data, JSON_PRETTY_PRINT));
header('location: ./index.php');
