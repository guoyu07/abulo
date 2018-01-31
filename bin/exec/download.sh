#!/usr/bin/env bash
rm -rf consul_1.0.3_linux_amd64.zip \
&& wget -P `pwd`/bin/exec https://releases.hashicorp.com/consul/1.0.3/consul_1.0.3_linux_amd64.zip \
&& unzip `pwd`/bin/exec/consul_1.0.3_linux_amd64.zip -d `pwd`/bin/exec/  && rm -rf `pwd`/bin/exec/consul_1.0.3_linux_amd64.zip
