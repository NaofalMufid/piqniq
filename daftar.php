<section id="daftar" class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h2 class="text-center">Formulir Pendaftaran</h2>
                <hr>
                <form>
                    <fieldset>
                        <legend>Data diri</legend>
                        <!--Form Data diri-->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">NIM</label>
                                <input type="text" class="form-control" name="nim" id="nim" placeholder="NIM">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="">Prodi</label>
                              <select class="form-control" name="prodi" id="prodi">
                                <option>Arsitek</option>
                                <option>Teknik Sipil</option>
                                <option>Teknik Informatika</option>
                                <option>Manajemen Informatika</option>
                                <option>Teknik Mesin</option>
                              </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">No. Telphon</label>
                                <input type="text" class="form-control" name="nim" id="nim" placeholder="NIM">
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Data Grup dan Kamar</legend>
                        <!--Form Tiket-->
                        <div class="form-row">
                            <div class="col-auto">
                                <select class="form-control" name="grup" id="grup">
                                    <option>Bis 1 Arsitek</option>
                                    <option>Bis 2 Teknik Sipil</option>
                                    <option>Bis 3 Teknik Sipil</option>
                                    <option>Bis 4 TI & SI</option>
                                    <option>Bis 5 Teknik Informatika</option>
                                    <option>Bis 6 Teknik Informatika</option>
                                </select>
                            </div>
                            <div class="col-auto">
                                <input list="kamar" class="form-control" placeholder="Kamar">
                                <datalist id="kamar">
                                    <option value="Kamar 1 Arsitek"></option>
                                    <option value="Kamar 2 Arsitek"></option>
                                    <option value="Kamar 3 Arsitek"></option>
                                    <option value="Kamar 4 Arsitek"></option>
                                    <option value="Kamar 5 Arsitek"></option>
                                    <option value="Kamar 1 Teknik Sipil"></option>
                                    <option value="Kamar 2 Teknik Sipil"></option>
                                </datalist>
                            </div>
                            <button type="submit" class="btn btn-primary btn-xs">Submit</button>
                        </div>        
                    </fieldset>
                </form>
                <p></p>
                <div class="alert alert-primary" role="alert">
                    <strong>Sesuaikan dengan data diri Anda dan ingat untuk kamar laki-laki perempuan dipisah</strong>
                </div>      
            </div>
        </div>
    </div>
    </section>