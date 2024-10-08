# nagios-ceph-perf
Nagios Plugin and PNP4Nagios Template for Acquiring Ceph Perf Data.

# why this and not the ceph distributed one?
It's considerably more detailed information than the one ceph hosts, including read/write throughput information and other detailed info a human could want.

# plugin args
```
usage: check_ceph_perf [-h] [-q] [-i ID] [-k KEYRING] [-e EXEC] [-s SAMPLES]
                       [-d SAMPLE_DELAY] [--generic_level GENERIC_LEVEL]
                       [--mon_generic] [--mon_generic_perf]
                       [--mon_storage_perf] [--mon_store_stats_perf]
                       [--osd_generic] [--osd_perf] [--pg_perf_storage]
                       [--pg_perf_states] [--pg_perf_throughput]
                       [--pg_perf_ops]

'ceph perf' nagios plugin.

optional arguments:
  -h, --help            show this help message and exit
  -q, --quick           quick output configuration (generic + | +
                        pg_perf_storage + pg_perf_througput + pg_perf_ops +
                        osd_perf), one sample unless defined elsewhere.
  -i ID, --id ID        ceph client id
  -k KEYRING, --keyring KEYRING
                        ceph client keyring file
  -e EXEC, --exec EXEC  ceph executable path [/usr/bin/ceph]
  -s SAMPLES, --samples SAMPLES
                        samples to take before providing output
  -d SAMPLE_DELAY, --sample_delay SAMPLE_DELAY
                        time between taking each sample in seconds
  --generic_level GENERIC_LEVEL
                        sets verbosity of output for the generic print (Non-
                        perf). 0 shows status, 1 shows quorum, 2 shows epoch,
                        3 shows fsid, 4 shows round.
  --mon_generic         render mon generic data (host, ip, ranking, updated)
  --mon_generic_perf    render mon perf data (latency, skew)
  --mon_storage_perf    render mon perf data (kb_avail,_total,_used)
  --mon_store_stats_perf
                        render mon perf data (bytes_log,_misc,_sst,_total)
  --osd_generic         render generic osd data (nearfull, full), defaults to
                        0
  --osd_perf            render osd perf data (num_osds, _up_osds,_in_osds
  --pg_perf_storage     render pg perf data (bytes_avail, _total, _used)
  --pg_perf_states      render pg perf states (Renders all possible states
                        [large amount of data])
  --pg_perf_throughput  render pg perf throughput (write/read bytes per
                        second)
  --pg_perf_ops         render pg perf ops (ops)
```
# notes
This will conflict with the ceph_perf nagios module, keep that in mind when testing.
