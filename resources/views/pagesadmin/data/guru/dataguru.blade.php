@extends('layoutsadmin.app')
@section('content')


 <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">DATA Guru</h3>
                <h6 class="op-7 mb-2">DATA GURU SMK SRIWIJAYA KARANGPUCUNG </h6>
              </div>
              <div class="ms-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-label-info btn-round me-2">messengger</a>
                <a href="#" class="btn btn-primary btn-round">Add guru</a>
              </div>
            </div>

              <div class="col-md-12">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                      <div class="card-title">Absensi Terkini</div>
                      <div class="card-tools">
                        <div class="dropdown">
                          <button
                            class="btn btn-icon btn-clean me-0"
                            type="button"
                            id="dropdownMenuButton"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <i class="fas fa-ellipsis-h"></i>
                          </button>
                          <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownMenuButton"
                          >
                            <a class="dropdown-item" href="#">Absen Tepat Waktu</a>
                            <a class="dropdown-item" href="#">Absen Terlambat</a>
                            <a class="dropdown-item" href="#"
                              >Belum Absen</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <!-- Projects table -->
                      <table class="table table-striped table-hover mb-0">
                            <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama Lengkap</th>
                                  <th>NIP</th>
                                  <th>Email</th>
                                  <th>Sekolah</th>
                                  <th>Alamat</th>
                                  <th>Foto</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($gurus as $index => $guru)
                              <tr>
                                  <td>{{ $index + 1 }}</td>
                                  <td>{{ $guru->nama_lengkap }}</td>
                                  <td>{{ $guru->nip }}</td>
                                  <td>{{ $guru->email }}</td>
                                  <td>{{ $guru->sekolah }}</td>
                                  <td>{{ $guru->alamat }}</td>
                                  <td>
                                      @if($guru->foto)
                                          <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto" width="50">
                                      @else
                                          Tidak ada
                                      @endif
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                    </table>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection