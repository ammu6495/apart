mkdir myproject && cd myproject
echo "hello" > hello
echo -e "from busybox\n COPY/hello/\nRUN cat /hello>Dockfile
Docker built -t helloappp:v1.
