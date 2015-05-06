<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	function __construct()
		{
			parent::__construct();
			$this->load->model('cert_model');
		}

	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			// $session_data = $this->session->userdata('logged_in');
			// $data['username'] = $session_data['username'];
			$this->load->view('adminpage');
		}
		else
		{
			//Jika tidak ada session di kembalikan ke halaman login
			redirect('welcome', 'refresh');
		}
	}

	 public function csr_sign() {
        // Let's assume that this script is set to receive a CSR that has
        // been pasted into a textarea from another page
        //$csrdata = $_POST["CSR"];
        $csrdata = "-----BEGIN CERTIFICATE REQUEST-----
MIICqTCCAZECAQAwZDELMAkGA1UEBhMCSUQxEzARBgNVBAgMCmphd2EgdGltdXIx
ETAPBgNVBAcMCFN1cmFiYXlhMQwwCgYDVQQKDANJVHMxDTALBgNVBAsMBEhNVEMx
EDAOBgNVBAMMB2FudS5jb20wggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIB
AQDCC713kQuJkHrSIVzFbLGPvjktZmSnGw1fPVSzrS4xAwqqYdOdSFMelr6ssH8+
NP7vlzqcweUkxSE3Hfa5dGp7kFZzp40n26Z6gUt2AE6hNV5eTJic+HUKkSq6Htf2
iRhfcfKLEBlKpYAn8wbLHxrIeIOJI+Vcu62SiViaD3MNHCBs/0kJQrAFXLbwdMoi
lg7UkL9+G+nvXNU0OzeYrjYzHEpgAzWbqdanVgJFFqSkJlPewcVTh0nUH4KKjOzw
N53i1l+1QlKIcVovxIj4xkfra5yuuHIAX+9Cre/xx5Xy4E9sCCe/pbRGv620CqzM
4SAf4M5HhJfnwAdKQ+nd6zyPAgMBAAGgADANBgkqhkiG9w0BAQUFAAOCAQEAAyAF
1Nzn+y10yGjhVbuhfuPgI/oHvj8x/U1NAOqa8xlBapEewOvNBqs7JOn5buF7hrv0
iTmypdJqB16FQ1r2LgSfU0wDn5WdqiQW9wTLhw9YIe4tc4yXBKvRbnpF+ugMUukb
ei7EpMk0X/CPAi5YqUY9b/yvNNqWAzoPmij21pXZJLFrJ4hji4HouRd6vecMV5Tq
Pac7ij7D2kAwkk4amKp53adlbeyQYGsnU3/mo3QaSIPwgZU9myajOtq5gznK2UTA
vGcPLGmA/gD3WL4G5heFrkgDujljxsMCU0qq7YJZ/XwE7wr2LBWN0t8gXEBlFpjK
AU4WR3lt+E4y71ZgNw==
-----END CERTIFICATE REQUEST-----";

        // We will sign the request using our own "certificate authority"
        // certificate.  You can use any certificate to sign another, but
        // the process is worthless unless the signing certificate is trusted
        // by the software/users that will deal with the newly signed certificate
        
        // We need our CA cert and its private key
        // $cacert = "file://path/to/ca.crt";
        // $privkey = "file://path/to/ca.key";
        
		$privkey = "-----BEGIN PRIVATE KEY-----
MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBALEFB63uzXAgJOZV
zcs8Jtcb2EqBMjj0b4VwtfD0x2cTuh/zTviBRLYjh9/JUDXDaSEw4O/Dm8lYts22
1zNpPGt1vXW9PRu1CGiGBNXcplsrY9jJ1T1AS9p8Xqxyi70HgLvL3dRDxIflQYSr
hKZqqiILuief/XvlHMGV/eS+nDTLAgMBAAECgYEAhii+wjabImBqNttOxbnH4f1r
dkPmUT4IC0T5zy1ktp0/0Zkv/6zQ642QG63SCX0Y/xuxTmWcewOuP8hT3tXiAHf7
M1nlfY+T6Hap5nCS2Vm/epR72pCmQiYi5MkpCh386bXcIIDL8Bk8TT+hUg8tlv+M
hr71sn+u8Jdg/5ODJLECQQDi/Zo93kpgTY61Gj1u4inpD1hOG6pQGqUI6PxVRQIB
SlKsPvZY0UuYV7O84nSQddsgS2EjDpS0gUql98lGAK/5AkEAx6SJ8tQiKFRy1XSO
I4JtHbC5DhwoFek2QMYc/V43aeXyMYBFJ7r76LxdV0+SFRYxB4ZuZX1wG2vtPl5c
jgJD4wJAXOqo18iFs5Qr5ZBfM2Oa+k8Qu7BxcCboBZSxrgn4fyS4YM/JMaRDCJJl
/dzJEFVeJIMWuS3/yz/dmcCrgF9JqQJAHGKSkooCyUUohpzp0LasmPoVdaIfOO5N
nmwMlyGcM1xUUSFxs7JsOqz9gHp5xLHBCtbcP2XUWLHBq4pzEmXUDQJAHgfuPlvz
+3JmF+PKRZ3ITBEL3ywL74gtWze3SvE4OcpL/HOKuBc3QbqKlbPd+Z5Pz+JYdJSF
1x1uy5zBS1AAoA==
-----END PRIVATE KEY-----";

        $cacert = "-----BEGIN CERTIFICATE-----
MIIDbzCCAtigAwIBAgIJANylKq+Uq74RMA0GCSqGSIb3DQEBBQUAMIGCMQswCQYD
VQQGEwJJRDERMA8GA1UECBMIU3VyYWJheWExEDAOBgNVBAcTB0tlcHV0aWgxEzAR
BgNVBAoTCkhvYXhDQSBJVFMxGDAWBgNVBAMTD0lUUyBJbmMgSG9heCBDQTEfMB0G
CSqGSIb3DQEJARYQSG9heENBQGdtYWlsLmNvbTAeFw0xNTA1MDYxMDIzMzlaFw0y
MDA1MDQxMDIzMzlaMIGCMQswCQYDVQQGEwJJRDERMA8GA1UECBMIU3VyYWJheWEx
EDAOBgNVBAcTB0tlcHV0aWgxEzARBgNVBAoTCkhvYXhDQSBJVFMxGDAWBgNVBAMT
D0lUUyBJbmMgSG9heCBDQTEfMB0GCSqGSIb3DQEJARYQSG9heENBQGdtYWlsLmNv
bTCBnzANBgkqhkiG9w0BAQEFAAOBjQAwgYkCgYEAsQUHre7NcCAk5lXNyzwm1xvY
SoEyOPRvhXC18PTHZxO6H/NO+IFEtiOH38lQNcNpITDg78ObyVi2zbbXM2k8a3W9
db09G7UIaIYE1dymWytj2MnVPUBL2nxerHKLvQeAu8vd1EPEh+VBhKuEpmqqIgu6
J5/9e+UcwZX95L6cNMsCAwEAAaOB6jCB5zAdBgNVHQ4EFgQUUiJ2sWNX8e8N2vBP
sMVixLKKDW4wgbcGA1UdIwSBrzCBrIAUUiJ2sWNX8e8N2vBPsMVixLKKDW6hgYik
gYUwgYIxCzAJBgNVBAYTAklEMREwDwYDVQQIEwhTdXJhYmF5YTEQMA4GA1UEBxMH
S2VwdXRpaDETMBEGA1UEChMKSG9heENBIElUUzEYMBYGA1UEAxMPSVRTIEluYyBI
b2F4IENBMR8wHQYJKoZIhvcNAQkBFhBIb2F4Q0FAZ21haWwuY29tggkA3KUqr5Sr
vhEwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQUFAAOBgQAi22Vn0+8oYQoShQTY
dzWjlMLdHPb5TtGMfgQZDzimdfzvI+9ld3ab83YKpXeBcnXEcpgrwkAf0pQ9Wji+
GZ+hGI1CX7sLEjApR7qlecb1QmG8Mt40X5eG7cC4Agm83zp5OqgeWKcfeoRzo8W/
pIsD+4fVYumL0rvFq+3IGb0MYA==
-----END CERTIFICATE-----";

        $usercert = openssl_csr_sign($csrdata, $cacert, $privkey, 365);
        
        // Now display the generated certificate so that the user can
        // copy and paste it into their local configuration (such as a file
        // to hold the certificate for their SSL server)
        openssl_x509_export($usercert, $certout);
        echo $certout;
        
        // Show any errors that occurred here
        while (($e = openssl_error_string()) !== false) {
            echo $e . "\n";
        }
}
